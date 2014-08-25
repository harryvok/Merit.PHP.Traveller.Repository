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


require_once('Tree.php');

class GDRenderer extends Tree
{
	const LINK_DIRECT = 1;
	const LINK_NORMAL = 2;
	const LINK_BEZIER = 3;
	const LINK_NONE = 4;
	const CENTER = 1;
	const LEFT = 5;
	const RIGHT = 10;
	const TOP = 16;
	const BOTTOM = 33;

	private $linktype;
	private $bgColor = array(255, 255, 255);
	private $nodeTitleColor = array(0, 128, 255);
	private $nodeMessageColor = array(0, 64, 255);
	private $borderColor = array();
	private $linkColor = array(0, 0, 0);
	private $borderWidth = 0;
	private $textTitleColor = array(0, 0, 0);
	private $textMessageColor = array(0, 0, 0);
	private $ftFont;
	private $ftFontSize;
	private $ftFontAngle;
	private $Align = self::CENTER;
	private $img;


	/**
	 * sets the style of the node connectors
	 * LINK_DIRECT draw direct lines
	 * LINK_NORMAL draw normal style
	 * LINK_BEZIER draw bezier lines
	 * @param int $type
	 */
	public function setNodeLinks($type)
	{
		$this->linktype = $type;
	}


	/**
	 * sets the backgroundcolor of the graph
	 * example array(255, 255, 225) is white
	 * @param array $arrColor
	 */
	public function setBGColor($arrColor)
	{
		$this->bgColor = $arrColor;
	}


	/**
	 * sets the node title backgroundcolor
	 * example array(255, 255, 225) is white
	 * @param array $arrColor
	 */
	public function setNodeTitleColor($arrColor)
	{
		$this->nodeTitleColor = $arrColor;
	}


	/**
	 * sets the node message backgroundcolor
	 * example array(255, 255, 225) is white
	 * @param array $arrColor
	 */
	public function setNodeMessageColor($arrColor)
	{
		$this->nodeMessageColor = $arrColor;
	}


	/**
	 * sets the node border
	 * @param array $arrColor
	 * @param int $border
	 */
	public function setNodeBorder($arrColor, $border)
	{
		$this->borderColor = $arrColor;
		$this->borderWidth = $border;
	}


	/**
	 * sets the color of the connectors
	 * example array(0, 0, 0) is black
	 * @param array $arrColor
	 */
	public function setLinkColor($arrColor)
	{
		$this->linkColor = $arrColor;
	}


	/**
	 * sets the color of the title text
	 * example array(0, 0, 0) is black
	 * @param array $arrColor
	 */
	public function setTextTitleColor($arrColor)
	{
		$this->textTitleColor = $arrColor;
	}


	/**
	 * sets the color of the message text
	 * example array(0, 0, 0) is black
	 * @param array $arrColor
	 */
	public function setTextMessageColor($arrColor)
	{
		$this->textMessageColor = $arrColor;
	}


	/**
	 * use TrueType Fonts
	 * Align: CENTER,TOP,BOTTOM,LEFT,RIGHT ex. GDRenderer::TOP|GDRenderer::LEFT
	 * @param string $font
	 * @param int $size
	 * @param int $angle
	 * @param int $align
	 */
	public function setFTFont($font, $size, $angle = 0, $align = self::CENTER)
	{
		if(!file_exists($font))
		{
			return false;
		}
		$this->ftFont = $font;
		$this->ftFontSize = $size;
		$this->ftFontAngle = $angle;
		$this->Align = $align;
	}

	protected function render()
	{
		if(!extension_loaded('gd'))
		{
			throw new Exception('GD not loaded!');
		}
		parent::render();
		$this->img = imagecreate($this->getWidth(), $this->getHeight());
		imagecolorallocate($this->img, $this->bgColor[0], $this->bgColor[1], $this->bgColor[2]);
		$nodeTitleBG = imagecolorallocate($this->img, $this->nodeTitleColor[0], $this->nodeTitleColor[1], $this->nodeTitleColor[2]);
		$nodeMessageBG = imagecolorallocate($this->img, $this->nodeMessageColor[0], $this->nodeMessageColor[1], $this->nodeMessageColor[2]);
		$linkCol = imagecolorallocate($this->img, $this->linkColor[0], $this->linkColor[1], $this->linkColor[2]);
		$textTitleColor = imagecolorallocate($this->img, $this->textTitleColor[0], $this->textTitleColor[1], $this->textTitleColor[2]);
		$textMessageColor = imagecolorallocate($this->img, $this->textMessageColor[0], $this->textMessageColor[1], $this->textMessageColor[2]);
		if($this->borderWidth > 0)
		{
			$borderCol = imagecolorallocate($this->img, $this->borderColor[0], $this->borderColor[1], $this->borderColor[2]);
		}

		while($this->hasNext())
		{
			$node = $this->next();
			if(!is_null($node->image) && file_exists($node->image))
			{
				$path_parts = pathinfo($node->image);
				$file_ext = strtolower($path_parts['extension']);
				$this->imgsize = getimagesize($node->image);
				switch ($file_ext)
				{
					case 'gif':
					$strSourceImage = imagecreatefromgif($node->image);
					break;

					case 'jpg':
					case 'jpeg':
						$strSourceImage = imagecreatefromjpeg($node->image);
						break;

					case 'png':
						$strSourceImage = imagecreatefrompng($node->image);
						$gdinfo = gd_info();
						if (version_compare($gdinfo["GD Version"], '2.0.1', '>='))
						{
							imageantialias($this->img, true);
							imagealphablending($this->img, false);
							imagesavealpha($this->img, true);
							imagefilledrectangle($this->img, $node->x, $node->y, $node->w, $node->h/2, imagecolorallocatealpha($this->img, 255, 255, 255, 127));
						}
						break;
				}
				imagecopyresampled($this->img, $strSourceImage, $node->x, $node->y, 0, 0, $node->w, $node->h, $this->imgsize[0], $this->imgsize[1]);
			}
			else
			{
				if(!empty($node->message)){
					imagefilledrectangle($this->img, $node->x, $node->y , $node->x + $node->w, $node->y + $node->h/2 , $nodeTitleBG);
					imagefilledrectangle($this->img, $node->x, $node->y + $node->h/2 , $node->x + $node->w, $node->y + $node->h , $nodeMessageBG);
				}else
					imagefilledrectangle($this->img, $node->x, $node->y , $node->x + $node->w, $node->y + $node->h , $nodeTitleBG);
			}
			if($this->borderWidth > 0)
			{
				for ($i = 0; $i < $this->borderWidth; $i++)
				{
					imagerectangle($this->img, $node->x + $i, $node->y + $i, $node->x + $node->w - $i, $node->y + $node->h - $i, $borderCol);
				}
			}
			switch($this->linktype)
			{
				case self::LINK_DIRECT:
					foreach($node->links as $link)
					{
						imageline ( $this->img, $link['xa'], $link['ya'], $link['xd'], $link['yd'], $linkCol );
					}
					break;

				case self::LINK_BEZIER:
					foreach($node->links as $link)
					{
						for ($t=0;$t<=1;$t=$t+.001)
					    {
							$xt = $link['xa'] * pow((1 - $t), 3) + $link['xb'] * 3 * $t * pow(1-$t, 2) + $link['xc'] * 3 * pow($t, 2) * (1-$t) + $link['xd'] * pow($t, 3);
							$yt = $link['ya'] * pow((1 - $t), 3) + $link['yb'] * 3 * $t * pow(1-$t, 2) + $link['yc'] * 3 * pow($t, 2) * (1-$t) + $link['yd'] * pow($t, 3);
							imagesetpixel($this->img, $xt, $yt, $linkCol);
					    }
					}
					break;
				case self::LINK_NONE:
					break;

				default:
					foreach($node->links as $link)
					{
						imageline ( $this->img, $link['xa'], $link['ya'], $link['xb'], $link['yb'], $linkCol );
						imageline ( $this->img, $link['xb'], $link['yb'], $link['xc'], $link['yc'], $linkCol );
						imageline ( $this->img, $link['xc'], $link['yc'], $link['xd'], $link['yd'], $linkCol );
					}
			}
// 			print_r($this->ftFont);exit;
			if(!strlen($this->ftFont))
			{
				imagestring( $this->img, 4, $node->x + $this->borderWidth, $node->y, $node->title, $textTitleColor);
				imagestring( $this->img, 4, $node->x + $this->borderWidth, $node->y+$node->h/2, $node->message, $textMessageColor);
			}
			else
			{
				$fttext = imageftbbox($this->ftFontSize, $this->ftFontAngle, $this->ftFont, $node->title);
				$x = ($fttext[0] <= $fttext[6]) ? $fttext[0] : $fttext[6];
				$y = ($fttext[5] >= $fttext[7]) ? $fttext[5] : $fttext[7];
				$x2 = ($fttext[2] >= $fttext[4]) ? $fttext[2] : $fttext[4];
				$y2 = ($fttext[1] >= $fttext[3]) ? $fttext[1] : $fttext[3];
				$w = array();
				$h = array();
				$left = array();
				$top = array();
				$w['title'] = $x2 - $x;
				$h['title'] = $y2 - $y;
				$left['title'] = ($node->w - $w['title']) / 2;
				if(!empty($node->message))
					$top['title'] = ($node->h/2 - $h['title']) / 2;
				else
					$top['title'] = ($node->h - $h['title']) / 2;

				$fttext = imageftbbox($this->ftFontSize, $this->ftFontAngle, $this->ftFont, $node->message);
				$x = ($fttext[0] <= $fttext[6]) ? $fttext[0] : $fttext[6];
				$y = ($fttext[5] >= $fttext[7]) ? $fttext[5] : $fttext[7];
				$x2 = ($fttext[2] >= $fttext[4]) ? $fttext[2] : $fttext[4];
				$y2 = ($fttext[1] >= $fttext[3]) ? $fttext[1] : $fttext[3];
				$w['message'] = $x2 - $x;
				$h['message'] = $y2 - $y;
				$left['message'] = ($node->w - $w['message']) / 2;
				$top['message'] = $node->h/2 + ($node->h/2 - $h['message']) / 2;

				switch($this->Align)
				{
					case self::CENTER|self::CENTER :
						if(!empty($node->message)){
							imagefttext( $this->img , $this->ftFontSize , $this->ftFontAngle , $node->x + $left['title'], $node->y + $top['title'] + $h['title'], $textTitleColor , $this->ftFont , $node->title);
							imagefttext( $this->img , $this->ftFontSize , $this->ftFontAngle , $node->x + $left['message'], $node->y + $top['message'] + $h['message'], $textMessageColor , $this->ftFont , $node->message);
						}else
							imagefttext( $this->img , $this->ftFontSize , $this->ftFontAngle , $node->x + $left['title'], $node->y + $top['title'] + $h['title'], $textTitleColor , $this->ftFont , $node->title);
						break;
					case self::CENTER|self::TOP:
					case self::TOP :
						if(!empty($node->message)){
							imagefttext( $this->img , $this->ftFontSize , $this->ftFontAngle , $node->x + $left['title'], $node->y + $this->borderWidth + $h['title'], $textTitleColor , $this->ftFont , $node->title);
							imagefttext( $this->img , $this->ftFontSize , $this->ftFontAngle , $node->x + $left['message'], $node->y + $node->h/2 + $this->borderWidth + $h['message'], $textMessageColor , $this->ftFont , $node->message);
						}else
							imagefttext( $this->img , $this->ftFontSize , $this->ftFontAngle , $node->x + $left['title'], $node->y + $this->borderWidth + $h['title'], $textTitleColor , $this->ftFont , $node->title);
						break;
					case self::CENTER|self::BOTTOM :
						if(!empty($node->message)){
							imagefttext( $this->img , $this->ftFontSize , $this->ftFontAngle , $node->x + $left['title'], $node->y + $node->h/2 - $this->borderWidth , $textTitleColor , $this->ftFont , $node->title);
							imagefttext( $this->img , $this->ftFontSize , $this->ftFontAngle , $node->x + $left['message'], $node->y + $node->h - $this->borderWidth , $textMessageColor , $this->ftFont , $node->message);
						}else
							imagefttext( $this->img , $this->ftFontSize , $this->ftFontAngle , $node->x + $left['title'], $node->y + $node->h['title'] - $this->borderWidth , $textTitleColor , $this->ftFont , $node->title);
						break;
					case self::LEFT|self::CENTER :
						if(!empty($node->message)){
							imagefttext( $this->img , $this->ftFontSize , $this->ftFontAngle , $node->x + $this->borderWidth, $node->y + $top['title'] + $h['title'], $textTitleColor , $this->ftFont , $node->title);
							imagefttext( $this->img , $this->ftFontSize , $this->ftFontAngle , $node->x + $this->borderWidth, $node->y + $top['message'] + $h['message'], $textMessageColor , $this->ftFont , $node->message);
						}else
							imagefttext( $this->img , $this->ftFontSize , $this->ftFontAngle , $node->x + $this->borderWidth, $node->y + $top['title'] + $h['title'], $textTitleColor , $this->ftFont , $node->title);
						break;
					case self::LEFT|self::TOP :
						if(!empty($node->message)){
							imagefttext( $this->img , $this->ftFontSize , $this->ftFontAngle , $node->x + $this->borderWidth, $node->y + $this->borderWidth + $h['title'] , $textTitleColor , $this->ftFont , $node->title);
							imagefttext( $this->img , $this->ftFontSize , $this->ftFontAngle , $node->x + $this->borderWidth, $node->y + $node->h/2 + $this->borderWidth + $h['message'], $textMessageColor , $this->ftFont , $node->message);
						}else
							imagefttext( $this->img , $this->ftFontSize , $this->ftFontAngle , $node->x + $this->borderWidth, $node->y + $this->borderWidth + $h['title'] , $textTitleColor , $this->ftFont , $node->title);
						break;
					case self::LEFT|self::BOTTOM :
						if(!empty($node->message)){
							imagefttext( $this->img , $this->ftFontSize , $this->ftFontAngle ,$node->x + $this->borderWidth, $node->y + $node->h/2 - $this->borderWidth, $textTitleColor , $this->ftFont , $node->title);
							imagefttext( $this->img , $this->ftFontSize , $this->ftFontAngle , $node->x + $this->borderWidth, $node->y + $node->h - $this->borderWidth, $textMessageColor , $this->ftFont , $node->message);
						}else
							imagefttext( $this->img , $this->ftFontSize , $this->ftFontAngle ,$node->x + $this->borderWidth, $node->y + $node->h - $this->borderWidth, $textTitleColor , $this->ftFont , $node->title);
						break;
					case self::RIGHT|self::CENTER :
					case self::RIGHT :
						if(!empty($node->message)){
							imagefttext( $this->img , $this->ftFontSize , $this->ftFontAngle , $node->x + $node->w - $this->borderWidth - $w['title'], $node->y + $top['title'] + $h['title'], $textTitleColor , $this->ftFont , $node->title);
							imagefttext( $this->img , $this->ftFontSize , $this->ftFontAngle , $node->x + $node->w - $this->borderWidth - $w['message'], $node->y + $top['message'] + $h['message'], $textMessageColor , $this->ftFont , $node->message);
						}else
							imagefttext( $this->img , $this->ftFontSize , $this->ftFontAngle , $node->x + $node->w - $this->borderWidth - $w['title'], $node->y + $top['title'] + $h['title'], $textTitleColor , $this->ftFont , $node->title);
						break;
					case self::RIGHT|self::TOP :
						if(!empty($node->message)){
							imagefttext( $this->img , $this->ftFontSize , $this->ftFontAngle , $node->x + $node->w - $this->borderWidth - $w['title'], $node->y + $this->borderWidth + $h['title'] , $textTitleColor , $this->ftFont , $node->title);
							imagefttext( $this->img , $this->ftFontSize , $this->ftFontAngle , $node->x + $node->w - $this->borderWidth - $w['message'], $node->y + $node->h/2 + $this->borderWidth + $h['message'], $textMessageColor , $this->ftFont , $node->message);
						}else
							imagefttext( $this->img , $this->ftFontSize , $this->ftFontAngle , $node->x + $node->w - $this->borderWidth - $w['title'], $node->y + $this->borderWidth + $h['title'] , $textTitleColor , $this->ftFont , $node->title);
						break;
					case self::RIGHT|self::BOTTOM :
						if(!empty($node->message)){
							imagefttext( $this->img , $this->ftFontSize , $this->ftFontAngle ,$node->x + $node->w - $this->borderWidth - $w['title'], $node->y + $node->h/2 - $this->borderWidth, $textTitleColor , $this->ftFont , $node->title);
							imagefttext( $this->img , $this->ftFontSize , $this->ftFontAngle , $node->x + $node->w - $this->borderWidth - $w['message'], $node->y + $node->h - $this->borderWidth, $textMessageColor , $this->ftFont , $node->message);
						}else
							imagefttext( $this->img , $this->ftFontSize , $this->ftFontAngle ,$node->x + $node->w - $this->borderWidth - $w['title'], $node->y + $node->h - $this->borderWidth, $textTitleColor , $this->ftFont , $node->title);
						break;
					default:
						if(!empty($node->message)){
							imagefttext( $this->img , $this->ftFontSize , $this->ftFontAngle , $node->x + $left['title'], $node->y + $this->borderWidth + $h['title'], $textTitleColor , $this->ftFont , $node->title);
							imagefttext( $this->img , $this->ftFontSize , $this->ftFontAngle , $node->x + $left['message'], $node->y + $this->borderWidth + $h['message'], $textMessageColor , $this->ftFont , $node->message);
						}else
							imagefttext( $this->img , $this->ftFontSize , $this->ftFontAngle , $node->x + $left['title'], $node->y + $this->borderWidth + $h['title'], $textTitleColor , $this->ftFont , $node->title);
				}
			}
		}
	}


	/**
	 * get the image as stream
	 */
	public function stream()
	{
		if(empty($this->img))
		{
			$this->render();
		}
		header('Content-type: image/png');
		imagepng($this->img);
	}


	/**
	 * save the image to file
	 * @param string $file
	 */

	public function save($file)
	{
		if(empty($this->img))
		{
			$this->render();
		}
		imagepng($this->img, $file);
	}
}
?>