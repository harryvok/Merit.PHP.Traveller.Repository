<?php
/**
 * Workflow System
 *
 * Designed to mimick the Workflow View of Merit's customer relationship management system.
 *
 * @version 1.0
 * @author Jon Cleary | Merit Technology
 */

/* SETTINGS */

define("nodeWidth", "300"); // Width of each Workflow object
define("nodeHeight", "150"); // Height of each Workflow object

// Simple node class with attributes
class Node
{
    public $colour;
    public $text;
    public $ID;
    public $parentID;
    
    public function __construct($nodeID, $nodeParent, $nodeColour, $nodeText){
        $this->text = $nodeText;
        $this->ID = $nodeID;
        $this->colour = $nodeColour;
        $this->parentID =  $nodeParent;
    }
}

// The overall workflow object
class Workflow
{
    public $nodes;
    private $canvas;
    private $bg;
    private $font;
    private $fontColour;
    private $totalChild;
    private $line;
    private $foundArray;
    private $levelFound = array();
   
    public function __construct(){
        $this->nodes = array();
    }

    // Add Node to Workflow diagram
    public function addNode($ID, $parentID, $colour, $text){
        array_push($this->nodes, new Node($ID, $parentID, $colour, $text));  
    }

    // Render the diagram
    public function render(){
        $this->totalChild = 0;
        $totalWidth = $this->calcWidth($this->nodes);
        $totalHeight = $this->calcHeight($this->nodes);
        
        $this->canvas = imagecreatetruecolor($totalWidth, $totalHeight);
        $white = imagecolorallocate($this->canvas, 255, 255, 255);
        imagefill($this->canvas, 0, 0, $white);
       
        $this->line = imagecolorallocate($this->canvas, 0, 0, 0);
        $this->font = 'arial.ttf';
        $this->fontColour = imagecolorallocate($this->canvas, 0,0,0);
        
        $i = 0;
        $extraHeight = 0;
        foreach($this->nodes as $node){
            if($node->parentID == ''){
                $x1 = 20;
                $y1 = $i + 20;
                $x2 = nodeWidth;
                $y2 = $i + nodeHeight;
                
                $bg = $node->colour == "W/Flow" ? imagecolorallocate($this->canvas, 205, 201, 201) : imagecolorallocate($this->canvas, 179, 198, 255);
                
                // Draw the rectangle
                $this->drawRectangle($this->canvas, $x1, $y1, $x2, $y2, "8", $bg);
                imagettftext( $this->canvas, 10, 0, $x1 + 10, $y1 + 20, $this->fontColour, $this->font, $node->text); 

                // Draw it's children
                
                $extraHeight = $extraHeight + $this->renderChildren($node, $x2, $y2);
                $i = $i + $extraHeight + nodeHeight + 20;
            }
        }
        
        // Output and free from memory
        header('Content-Type: image/jpeg');

        imagejpeg($this->canvas);
        imagedestroy($this->canvas);
    }

    
    // A loop to render children of a node, and that node's children etc.
    private function renderChildren($node, $x2, $y2){
        $return = 0;
        $extraHeight = 0;
        foreach($this->nodes as $child){
            if($child->parentID == $node->ID){

                $c_x1 = $x2 - 50;
                $c_y1 = $y2 + $extraHeight + 20;
                $c_x2 = $c_x1 + nodeWidth;
                $c_y2 = $c_y1 + nodeHeight;
                
                $bg = $child->colour == "W/Flow" ? imagecolorallocate($this->canvas, 205, 201, 201) : imagecolorallocate($this->canvas, 179, 198, 255);
               
                // Draw the rectangle
                $this->drawRectangle($this->canvas, $c_x1, $c_y1, $c_x2, $c_y2, "8", $bg);
                imagettftext( $this->canvas, 10, 0, $c_x1 + 10, $c_y1 + 20, $this->fontColour, $this->font, $child->text); 
                
                $extraHeight = $extraHeight + nodeHeight + 20 + $this->renderChildren($child, $c_x2, $c_y2);
                
                $return = $extraHeight;
            }
        }   

        return $return;
    }
    
    // Draws a rectangle image with curved radius
    private function drawRectangle($img, $x1, $y1, $x2, $y2, $radius, $color,$filled=1) {
        if ($filled==1){
            imagefilledrectangle($img, $x1+$radius, $y1, $x2-$radius, $y2, $color);
            imagefilledrectangle($img, $x1, $y1+$radius, $x1+$radius-1, $y2-$radius, $color);
            imagefilledrectangle($img, $x2-$radius+1, $y1+$radius, $x2, $y2-$radius, $color);

            imagefilledarc($img,$x1+$radius, $y1+$radius, $radius*2, $radius*2, 180 , 270, $color, IMG_ARC_PIE);
            imagefilledarc($img,$x2-$radius, $y1+$radius, $radius*2, $radius*2, 270 , 360, $color, IMG_ARC_PIE);
            imagefilledarc($img,$x1+$radius, $y2-$radius, $radius*2, $radius*2, 90 , 180, $color, IMG_ARC_PIE);
            imagefilledarc($img,$x2-$radius, $y2-$radius, $radius*2, $radius*2, 360 , 90, $color, IMG_ARC_PIE);
        }else{
            imageline($img, $x1+$radius, $y1, $x2-$radius, $y1, $color);
            imageline($img, $x1+$radius, $y2, $x2-$radius, $y2, $color);
            imageline($img, $x1, $y1+$radius, $x1, $y2-$radius, $color);
            imageline($img, $x2, $y1+$radius, $x2, $y2-$radius, $color);

            imagearc($img,$x1+$radius, $y1+$radius, $radius*2, $radius*2, 180 , 270, $color);
            imagearc($img,$x2-$radius, $y1+$radius, $radius*2, $radius*2, 270 , 360, $color);
            imagearc($img,$x1+$radius, $y2-$radius, $radius*2, $radius*2, 90 , 180, $color);
            imagearc($img,$x2-$radius, $y2-$radius, $radius*2, $radius*2, 360 , 90, $color);
        }                
    }
    
    // Calculates the width of the image by looping through nodes and checking if it has any children
    private function calcWidth($nodes){
        $this->checkChild($nodes, 0, 0);
        return $this->totalChild * (nodeWidth +20);
    }
    
    // Calculates the height of the image
    private function calcHeight($nodes){
        return count($nodes) * (nodeHeight + 20);
    }
    
    // Sets the totalChild variable to the parameter's value, which is determined by the hierarchy level in which it is currently looping
    private function checkChild($nodes, $parentID, $changeLevel){
        $this->totalChild = $changeLevel;
        $count = 0;
        foreach($nodes as $child){
            if($child->parentID == $parentID){
                $count = $count + 1;
                if(!in_array($changeLevel, $this->levelFound)){
                    $this->totalChild = $this->totalChild + 1;
                    array_push($this->levelFound, $changeLevel);
                    $this->checkChild($nodes, $child->ID, $this->totalChild);
                }
                else{
                    $this->checkChild($nodes, $child->ID, $this->totalChild);
                }
            }
        }
    }
}