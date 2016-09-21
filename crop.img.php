<?php
 function makeThumb( $filepath, $thumbSize=300 ){
  // echo 'mt'.$filepath;
 /* Set Filenames */
  $srcFile = $filepath;//.'/'.$filename;//'blocks/img/gallery/'.$filename;
  $thumbFile = dirname($filepath) .'/thumb_'.basename($filepath);//.'.png';// $filepath.'/thumb/'.$filename;// 'blocks/img/gallery/thumbs/'.$filename;
$thumbFilePath = $thumbFile;
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
  imagecopy( $new , $src , 0 , 0 , 0, $oldH / 2 - $thumbSize /2 , $thumbSize , $thumbSize , $oldW , $oldH );
    $src = imagepng( $new , $thumbFilePath );
  imagedestroy( $new );
//  imagedestroy( $src );

  return $thumbFilePath;
}
