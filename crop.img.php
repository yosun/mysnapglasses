<?php
 function makeThumb( $filepath, $thumbSize=350 ){
  global $max_width, $max_height;
 /* Set Filenames */
  $srcFile = $filepath;//.'/'.$filename;//'blocks/img/gallery/'.$filename;
  $thumbFile = dirname($filepath) .'/thumb_'.$basename($filepath).'.png';// $filepath.'/thumb/'.$filename;// 'blocks/img/gallery/thumbs/'.$filename;
 /* Determine the File Type */
  $type = substr( $filename , strrpos( $filename , '.' )+1 );
 /* Create the Source Image */
  $src = imagecreatefrompng( $srcFile );
 /* Determine the Image Dimensions */
  $oldW = imagesx( $src );
  $oldH = imagesy( $src );
 /* Calculate the New Image Dimensions */

    $newW = $thumbSize;
    $newH = $oldH * ( $thumbSize / $newW );

 /* Create the New Image */
  $new = imagecreatetruecolor( $thumbSize , $thumbSize );
 /* Transcribe the Source Image into the New (Square) Image */
  imagecopyresampled( $new , $src , 0 , 0 , ( $newW-$thumbSize )/2 , ( $newH-$thumbSize )/2 , $thumbSize , $thumbSize , $oldW , $oldH );
    $src = imagepng( $new , $thumbFile );
  imagedestroy( $new );
  imagedestroy( $src );
}
