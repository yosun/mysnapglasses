<?php
 function makeThumb( $filepath, $thumbSize=200 ){
  // echo 'mt'.$filepath;
 /* Set Filenames */
  $srcFile = $filepath;//.'/'.$filename;//'blocks/img/gallery/'.$filename;
  $thumbFile = dirname($filepath) .'/thumb_'.basename($filepath);//.'.png';// $filepath.'/thumb/'.$filename;// 'blocks/img/gallery/thumbs/'.$filename;
$thumbFilePath = $thumbFile;
$im = imagecreatefrompng($filepath );
$imgsize = getimagesize($im);
    $width = $imgsize[0];
    $height = $imgsize[1];
imagecopyresampled()
$to_crop_array = array('x' =>0 , 'y' => 0, 'width' => $thumbSize, 'height'=> $thumbSize);
$w_point = (($width - $width_new) / 2); 
imagecopyresampled($dst_img, $src_img, 0, 0, $w_point, 0,   $thumbSize, $thumbSize,$width , $height);

  return $thumbFilePath;
}
