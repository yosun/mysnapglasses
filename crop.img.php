<?php
 function makeThumb( $filepath, $thumbSize=300 ){
  // echo 'mt'.$filepath;
 /* Set Filenames */
  $srcFile = $filepath;//.'/'.$filename;//'blocks/img/gallery/'.$filename;
  $thumbFile = dirname($filepath) .'/thumb_'.basename($filepath);//.'.png';// $filepath.'/thumb/'.$filename;// 'blocks/img/gallery/thumbs/'.$filename;
$thumbFilePath = $thumbFile;

$imagick = new \Imagick(realpath($filepath));
    $imagick->cropImage($thumbSize,$thumbSize, 0,0);
$imagick->writeImage($thumbFilePath);

  return $thumbFilePath;
}
