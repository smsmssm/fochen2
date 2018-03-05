<?php 
/** 
* ��ˮӡ�֧࣬������ͼƬˮӡ��͸�������á�ˮӡͼƬ����͸���� 
* ���ڣ�2011-09-27 
* ���ߣ�www.jb51.net 
* ʹ�ã� 
* $obj = new WaterMask($imgFileName); //ʵ�������� 
* $obj->$waterType = 1; //���ͣ�0Ϊ����ˮӡ��1ΪͼƬˮӡ 
* $obj->$transparent = 45; //ˮӡ͸���� 
* $obj->$waterStr = 'www.jb51.net'; //ˮӡ���� 
* $obj->$fontSize = 16; //���������С 
* $obj->$fontColor = array(255,0255); //ˮӡ������ɫ��RGB�� 
* $obj->$fontFile = = 'AHGBold.ttf'; //�����ļ� 
* $obj->output(); //���ˮӡͼƬ�ļ����ǵ������ͼƬ�ļ� 
*/ 
class WaterMask{ 
public $waterType = 1; //ˮӡ���ͣ�0Ϊ����ˮӡ��1ΪͼƬˮӡ 
public $pos = 0; //ˮӡλ�� 
public $transparent = 45; //ˮӡ͸���� 

public $waterStr = 'www.jb51.net'; //ˮӡ���� 
public $fontSize = 16; //���������С 
public $fontColor = array(255,0,255); //ˮӡ������ɫ��RGB�� 
public $fontFile = 'AHGBold.ttf'; //�����ļ� 

public $waterImg = 'logo.png'; //ˮӡͼƬ 

private $srcImg = ''; //��Ҫ���ˮӡ��ͼƬ 
private $im = ''; //ͼƬ��� 
private $water_im = ''; //ˮӡͼƬ��� 
private $srcImg_info = ''; //ͼƬ��Ϣ 
private $waterImg_info = ''; //ˮӡͼƬ��Ϣ 
private $str_w = ''; //ˮӡ���ֿ�� 
private $str_h = ''; //ˮӡ���ָ߶� 
private $x = ''; //ˮӡX���� 
private $y = ''; //ˮӡy���� 

function __construct($img) { //�������� 
$this->srcImg = file_exists($img) ? $img : die('"'.$img.'" Դ�ļ������ڣ�'); 
} 
private function imginfo() { //��ȡ��Ҫ���ˮӡ��ͼƬ����Ϣ��������ͼƬ�� 
$this->srcImg_info = getimagesize($this->srcImg); 
switch ($this->srcImg_info[2]) { 
case 3: 
$this->im = imagecreatefrompng($this->srcImg); 
break 1; 
case 2: 
$this->im = imagecreatefromjpeg($this->srcImg); 
break 1; 
case 1: 
$this->im = imagecreatefromgif($this->srcImg); 
break 1; 
default: 
die('ԭͼƬ��'.$this->srcImg.'����ʽ���ԣ�ֻ֧��PNG��JPEG��GIF��'); 
} 
} 
private function waterimginfo() { //��ȡˮӡͼƬ����Ϣ��������ͼƬ�� 
$this->waterImg_info = getimagesize($this->waterImg); 
switch ($this->waterImg_info[2]) { 
case 3: 
$this->water_im = imagecreatefrompng($this->waterImg); 
break 1; 
case 2: 
$this->water_im = imagecreatefromjpeg($this->waterImg); 
break 1; 
case 1: 
$this->water_im = imagecreatefromgif($this->waterImg); 
break 1; 
default: 
die('ˮӡͼƬ��'.$this->srcImg.'����ʽ���ԣ�ֻ֧��PNG��JPEG��GIF��'); 
} 
} 
private function waterpos() { //ˮӡλ���㷨 
switch ($this->pos) { 
case 0: //���λ�� 
$this->x = rand(0,$this->srcImg_info[0]-$this->waterImg_info[0]); 
$this->y = rand(0,$this->srcImg_info[1]-$this->waterImg_info[1]); 
break 1; 
case 1: //���� 
$this->x = 0; 
$this->y = 0; 
break 1; 
case 2: //���� 
$this->x = ($this->srcImg_info[0]-$this->waterImg_info[0])/2; 
$this->y = 0; 
break 1; 
case 3: //���� 
$this->x = $this->srcImg_info[0]-$this->waterImg_info[0]; 
$this->y = 0; 
break 1; 
case 4: //���� 
$this->x = 0; 
$this->y = ($this->srcImg_info[1]-$this->waterImg_info[1])/2; 
break 1; 
case 5: //���� 
$this->x = ($this->srcImg_info[0]-$this->waterImg_info[0])/2; 
$this->y = ($this->srcImg_info[1]-$this->waterImg_info[1])/2; 
break 1; 
case 6: //���� 
$this->x = $this->srcImg_info[0]-$this->waterImg_info[0]; 
$this->y = ($this->srcImg_info[1]-$this->waterImg_info[1])/2; 
break 1; 
case 7: //���� 
$this->x = 0; 
$this->y = $this->srcImg_info[1]-$this->waterImg_info[1]; 
break 1; 
case 8: //���� 
$this->x = ($this->srcImg_info[0]-$this->waterImg_info[0])/2; 
$this->y = $this->srcImg_info[1]-$this->waterImg_info[1]; 
break 1; 
default: //���� 
$this->x = $this->srcImg_info[0]-$this->waterImg_info[0]; 
$this->y = $this->srcImg_info[1]-$this->waterImg_info[1]; 
break 1; 
} 
} 
private function waterimg() { 
if ($this->srcImg_info[0] <= $this->waterImg_info[0] || $this->srcImg_info[1] <= $this->waterImg_info[1]){ 
die('ˮӡ��ԭͼ��'); 
} 
$this->waterpos(); 
$cut = imagecreatetruecolor($this->waterImg_info[0],$this->waterImg_info[1]); 
imagecopy($cut,$this->im,0,0,$this->x,$this->y,$this->waterImg_info[0],$this->waterImg_info[1]); 
$pct = $this->transparent; 
imagecopy($cut,$this->water_im,0,0,0,0,$this->waterImg_info[0],$this->waterImg_info[1]); 
imagecopymerge($this->im,$cut,$this->x,$this->y,0,0,$this->waterImg_info[0],$this->waterImg_info[1],$pct); 
} 
private function waterstr() { 
$rect = imagettfbbox($this->fontSize,0,$this->fontFile,$this->waterStr); 
$w = abs($rect[2]-$rect[6]); 
$h = abs($rect[3]-$rect[7]); 
$fontHeight = $this->fontSize; 
$this->water_im = imagecreatetruecolor($w, $h); 
imagealphablending($this->water_im,false); 
imagesavealpha($this->water_im,true); 
$white_alpha = imagecolorallocatealpha($this->water_im,255,255,255,127); 
imagefill($this->water_im,0,0,$white_alpha); 
$color = imagecolorallocate($this->water_im,$this->fontColor[0],$this->fontColor[1],$this->fontColor[2]); 
imagettftext($this->water_im,$this->fontSize,0,0,$this->fontSize,$color,$this->fontFile,$this->waterStr); 
$this->waterImg_info = array(0=>$w,1=>$h); 
$this->waterimg(); 
} 
function output() { 
$this->imginfo(); 
if ($this->waterType == 0) { 
$this->waterstr(); 
}else { 
$this->waterimginfo(); 
$this->waterimg(); 
} 
switch ($this->srcImg_info[2]) { 
case 3: 
imagepng($this->im,$this->srcImg); 
break 1; 
case 2: 
imagejpeg($this->im,$this->srcImg); 
break 1; 
case 1: 
imagegif($this->im,$this->srcImg); 
break 1; 
default: 
die('���ˮӡʧ�ܣ�'); 
break; 
} 
imagedestroy($this->im); 
imagedestroy($this->water_im); 
} 
} 
?> 
