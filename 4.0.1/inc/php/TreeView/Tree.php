<?php

/**
  * phpTreeGraph
  *
  *
  * PHP version 5
  * @copyright  Mathias Herrmann 2007
  * @author     Mathias Herrmann <mathias_herrmann@arcor.de>
  * @author     Alex Fomenko <alex.fomenko@gmail.com>
  * @license    LGPL
  *                                                                          *
  * This PHP class is free software; you can redistribute it and/or          *
  * modify it under the terms of the GNU Lesser General Public               *
  * License as published by the Free Software Foundation; either             *
  * version 2.1 of the License, or (at your option) any later version.       *
  *                                                                          *
  * This PHP class is distributed in the hope that it will be useful,        *
  * but WITHOUT ANY WARRANTY; without even the implied warranty of           *
  * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU         *
  * Lesser General Public License for more details.                          *
  *                                                                          *
  *                                                                          *
  *                                                                          *
  *
*/

if (version_compare(phpversion(), '5.0.0', '<'))
{
	die('You need at least PHP version 5.0.0!');
}
require_once('Node.php');

class Tree{
	private $maxLevelHeight = array();
	private $maxLevelWidth = array();
	private $previousLevelNode = array();
	private $nodes = array();
	private $root;
	private $LevelSeparation;
	private $SiblingSeparation;
	private $SubtreeSeparation;
	private $defaultHeight;
	private $defaultWidth;
	private $isRendered = false;
	private $position = 0;
	private $h = 0;
	private $w = 0;
	private $marginX;
	private $marginY;
	private $minX;


	/**
	* Constructor
	* @param int $LevelSeparation optional
	* @param int $SiblingSeparation optional
	* @param int $SubtreeSeparation optional
	* @param int $defaultWidth optional
	* @param int $defaultHeight optional
	* @param int $marginX optional
	* @param int $marginY optional
	*/
	public function __construct($LevelSeparation=40, $SiblingSeparation=40, $SubtreeSeparation=80, $defaultWidth=40, $defaultHeight=40, $marginX = 5, $marginY = 5)	{
		$this->root = new Node(0, 0, 0, 0, "");
		$this->LevelSeparation = $LevelSeparation;
		$this->SiblingSeparation = $SiblingSeparation;
		$this->SubtreeSeparation = $SubtreeSeparation;
		$this->defaultHeight = $defaultHeight;
		$this->defaultWidth = $defaultWidth;
		$this->minX = $this->marginX = $marginX;
		$this->marginY = $marginY;
	}


	/**
	* function to add a node to the tree
	* @param int id
	* @param int $pid id of the parent node, false or 0 is there is no parent
	* @param string $message optional
	* @param int $w optional
	* @param int $h optional
	* @param string $image path to image optional
	*/
	public function add($id, $pid, $title='', $message='', $w=0, $h=0, $image = null )	{
		$w = ($w == 0) ? $this->defaultWidth : $w;
		$h = ($h == 0) ? $this->defaultHeight : $h;
		if(empty($id))
			die("Error id = $id");
		if(isset($this->nodes[$id])){
			$node = $this->nodes[$id];
			$node->pid = ($pid !== false)? $pid : 0;
			$node->w = $w;
			$node->h = $h;
			$node->title = $title;
			$node->message = $message;
			$node->image = $image;
			if($pid){
				unset($this->root->children[$id]);
			}
		}else
			$node = new Node($id, ($pid !== false)? $pid : 0, $w, $h, $title, $message, $image);
		if(empty($pid)){
			$pnode = $this->root;
			$node->nodeParent = $pnode;
			$pnode->children[$id] = $node;
		}elseif(isset($this->nodes[$pid])){
			$pnode = $this->nodes[$pid];
			$node->nodeParent = $pnode;
			$pnode->children[] = $node;
		}else{
			$this->add($pid, false, 'Not defined');
			$pnode = $this->nodes[$pid];
			$node->nodeParent = $pnode;
			$pnode->children[] = $node;
		}
		$this->nodes[$id] = $node;
	}

	private function firstwalk($node, $level){
		$this->setLevelHeight($node, $level);
		$this->setLevelWidth($node, $level);
		$this->setNeighbors($node, $level);
		if($node->numChildren()==0){
			$leftSibling = $node->getLeftSibling();
			if($leftSibling){
				$node->prelim = $leftSibling->prelim + $leftSibling->w + $this->SiblingSeparation;
			}else{
				$node->prelim = 0;
			}
		}else{
			$n = $node->numChildren();
			for($i = 0; $i < $n; $i++){
				$this->firstWalk($node->getChildAt($i), $level + 1);
			}
			$midPoint = $node->getChildrenCenter();
			$midPoint -= $node->w / 2;
			$leftSibling = $node->getLeftSibling();
			if($leftSibling){
				$node->prelim = $leftSibling->prelim + $leftSibling->w + $this->SiblingSeparation;
				$node->modifier = $node->prelim - $midPoint;
				$this->apportion($node, $level);
			}else{
				$node->prelim = $midPoint;
			}
		}
	}

	private function secondWalk($node, $level, $x=0, $y=0){
		$xTmp = $node->prelim + $x;
		$yTmp = $y;
		$maxsizeTmp = ($level == 0) ? $this->defaultHeight : $this->maxLevelHeight[$level];
		$node->x = $xTmp + $this->marginX;
		$node->y = $yTmp - $this->defaultHeight;
		$this->h = ($this->h > $node->y + $node->h) ? $this->h : $node->y + $node->h;
		$this->w = ($this->w > $node->x + $node->w) ? $this->w : $node->x + $node->w + $this->marginX;

		if($node->numChildren()){
			$this->secondWalk($node->getChildAt(0), $level + 1, $x + $node->modifier, $y + $maxsizeTmp + (($level == 0) ? $this->marginY : $this->LevelSeparation));
		}
		$rightSibling = $node->getRightSibling();
		if($rightSibling){
			$this->secondWalk($rightSibling, $level, $x, $y);
		}
		$this->minX = min($this->minX, $node->x);
	}

	private function apportion($node, $level){
		$firstChild = $node->getChildAt(0);
		$firstChildLeftNeighbor = $firstChild->leftNeighbor;
		for($j = 1; $firstChild && $firstChildLeftNeighbor;){
			$modifierSumRight = 0;
			$modifierSumLeft = 0;
			$rightAncestor = $firstChild;
			$leftAncestor = $firstChildLeftNeighbor;
			for($l = 0; $l < $j; $l++){
				$rightAncestor = $rightAncestor->nodeParent;
				$leftAncestor = $leftAncestor->nodeParent;
				$modifierSumRight += $rightAncestor->modifier;
				$modifierSumLeft += $leftAncestor->modifier;
			}

			$totalGap = ($firstChildLeftNeighbor->prelim + $modifierSumLeft + $firstChildLeftNeighbor->w + $this->SubtreeSeparation) - ($firstChild->prelim + $modifierSumRight);
			if($totalGap > 0){
				$subtreeAux = $node;
				$numSubtrees = 0;

				for(; $subtreeAux && $subtreeAux !== $leftAncestor; $subtreeAux = $subtreeAux->getLeftSibling()){
					$numSubtrees++;
				}

				if($subtreeAux){
					$subtreeMoveAux = $node;
					$singleGap = $totalGap / $numSubtrees;
					for(; $subtreeMoveAux !== $leftAncestor; $subtreeMoveAux = $subtreeMoveAux->getLeftSibling()){
						$subtreeMoveAux->prelim += $totalGap;
						$subtreeMoveAux->modifier += $totalGap;
						$totalGap -= $singleGap;
					}
				}
			}
			$j++;
			if($firstChild->numChildren() == 0){
				$firstChild = $this->getLeftmost($node, 0, $j);
			}else{
				$firstChild = $firstChild->getChildAt(0);
			}
			if($firstChild){
				$firstChildLeftNeighbor = $firstChild->leftNeighbor;
			}
		}
	}

	private function setLevelHeight($node, $level){
		if (!isset($this->maxLevelHeight[$level])){
			$this->maxLevelHeight[$level] = 0;
		}
		if($this->maxLevelHeight[$level] < $node->h){
			$this->maxLevelHeight[$level] = $node->h;
		}
	}

	private function setLevelWidth($node, $level){
		if (!isset($this->maxLevelWidth[$level])){
			$this->maxLevelWidth[$level] = 0;
		}
		if($this->maxLevelWidth[$level] < $node->w){
			$this->maxLevelWidth[$level] = $node->w;
		}
	}

	private function setNeighbors($node, $level){
		$node->leftNeighbor = (isset($this->previousLevelNode[$level])) ? $this->previousLevelNode[$level] : 0 ;
		if($node->leftNeighbor){
			$node->leftNeighbor->rightNeighbor = $node;
		}
		$this->previousLevelNode[$level] = $node;
	}

	private function getLeftmost($node, $level, $maxlevel){
		if($level >= $maxlevel){
			return $node;
		}
		if(($n=$node->numChildren())==0){
			return false;
		}
		for($i = 0; $i < $n; $i++){
			$iChild = $node->getChildAt($i);
			$leftmostDescendant = $this->getLeftmost($iChild, $level + 1, $maxlevel);
			if($leftmostDescendant){
				return $leftmostDescendant;
			}
		}
		return 0;
	}

	protected function render(){
		sort($this->root->children);
		sort($this->nodes);
		$this->nodes[$this->count()] = $this->nodes[0];
		unset($this->nodes[0]);
		$this->firstwalk($this->root, 0);
		$this->secondWalk($this->root, 0, 0);
		if($this->minX < $this->marginX){
			$this->w -= $this->minX - $this->marginX;
			foreach($this->nodes as $node){
				$node->x -= $this->minX - $this->marginX;
			}
		}
		foreach($this->nodes as $node){
			$node->getLinks();
		}
		$this->isRendered = true;
	}

	public function getWidth(){
		if(!$this->isRendered){
			$this->render();
		}
		return $this->w;
	}

	public function getHeight(){
		if(!$this->isRendered){
			$this->render();
		}
		return  $this->h + $this->marginY;
	}

	public function count(){
		return count($this->nodes);
	}


	/**
	* iterator function to get the nodes
	* @return mixed
	*/
	public function next(){
		if(!$this->isRendered){
			$this->render();
		}
		if(isset($this->nodes[$this->position+1])){
			$this->position++;
			return $this->nodes[$this->position];
		}else{
			return false;
		}
	}

	/**
	* @return boolean
	*/
	public function hasNext(){
		if(!isset($this->nodes[$this->position+1]) ){
			return false;
		}
		return true;
	}

	public function getNodeAt($i){
		if(!isset($this->nodes[$i])){
			return false;
		}else{
			return $this->nodes[$i];
		}
	}

	public function setRootNode($id){
		$this->nodes[$id]->nodeParent = $this->root;
		$this->root->children = array(1 => $this->nodes[$id]);
		$showNodes = array();
		$this->setShowNodes($this->nodes[$id], $showNodes);
		foreach($this->nodes as $id => $node){
			if(!in_array($id,$showNodes))
				unset($this->nodes[$id]);
		}
	}

	private function setShowNodes($node, &$showNodes){
		$showNodes[] = $node->id;
		if($node->numChildren()){
			foreach($node->children as $child){
				$this->setShowNodes($child, $showNodes);
			}
		}
	}
}

?>