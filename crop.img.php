<?php
 function makeThumb( $filepath, $thumbSize=250 ){
  // echo 'mt'.$filepath;
 /* Set Filenames */
  $srcFile = $filepath;//.'/'.$filename;//'blocks/img/gallery/'.$filename;
  $thumbFile = dirname($filepath) .'/thumb_'.basename($filepath);//.'.png';// $filepath.'/thumb/'.$filename;// 'blocks/img/gallery/thumbs/'.$filename;
$thumbFilePath = $thumbFile;
$im = imagecreatefrompng($filepath );
$to_crop_array = array('x' =>0 , 'y' => 0, 'width' => $thumbSize, 'height'=> $thumbSize);
$thumb_im = imagecrop($im, $to_crop_array);
imagepng($thumb_im, $thumbFilePath);
  return $thumbFilePath;
}
