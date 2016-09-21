<?php
 function makeThumb( $filepath, $thumbSize=250 ){
  // echo 'mt'.$filepath;
 /* Set Filenames */
  $srcFile = $filepath;//.'/'.$filename;//'blocks/img/gallery/'.$filename;
  $thumbFile = dirname($filepath) .'/thumb_'.basename($filepath);//.'.png';// $filepath.'/thumb/'.$filename;// 'blocks/img/gallery/thumbs/'.$filename;
$thumbFilePath = $thumbFile;

$imagick = new imagick(realpath($filepath));
    $imagick->cropThumbnailImage($thumbSize,$thumbSize);//, 0,0);
$imagick->writeImage($thumbFilePath);

  return $thumbFilePath;
}
