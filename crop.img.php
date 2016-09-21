<?php
 function makeThumb( $filepath, $thumbSize=200 ){
  // echo 'mt'.$filepath;
 /* Set Filenames */
  $srcFile = $filepath;//.'/'.$filename;//'blocks/img/gallery/'.$filename;
  $thumbFile = dirname($filepath) .'/thumb_'.basename($filepath);//.'.png';// $filepath.'/thumb/'.$filename;// 'blocks/img/gallery/thumbs/'.$filename;
$thumbFilePath = $thumbFile; $destination_file = $thumbFilePath;

 $original_file=$filepath; $new_height=$thumbSize; $new_width=$new_height; $square_size = $thumbSize;

  // get width and height of original image
  $imagedata = getimagesize($original_file);
  $original_width = $imagedata[0];
  $original_height = $imagedata[1];

  if($original_width > $original_height){
    $new_height = $square_size;
    $new_width = $new_height*($original_width/$original_height);
  }
  if($original_height > $original_width){
    $new_width = $square_size;
    $new_height = $new_width*($original_height/$original_width);
  }
  if($original_height == $original_width){
    $new_width = $square_size;
    $new_height = $square_size;
  }

  $new_width = round($new_width);
  $new_height = round($new_height);


    $original_image = imagecreatefrompng($original_file);


  $smaller_image = imagecreatetruecolor($new_width, $new_height);
  $square_image = imagecreatetruecolor($square_size, $square_size);

  imagecopyresampled($smaller_image, $original_image, 0, 0, 0, 0, $new_width, $new_height, $original_width, $original_height);

  if($new_width>$new_height){
    $difference = $new_width-$new_height;
    $half_difference =  round($difference/2);
    imagecopyresampled($square_image, $smaller_image, 0-$half_difference+1, 0, 0, 0, $square_size+$difference, $square_size, $new_width, $new_height);
  }
  if($new_height>$new_width){
    $difference = $new_height-$new_width;
    $half_difference =  round($difference/2);
    imagecopyresampled($square_image, $smaller_image, 0, 0-$half_difference+1, 0, 0, $square_size, $square_size+$difference, $new_width, $new_height);
  }
  if($new_height == $new_width){
    imagecopyresampled($square_image, $smaller_image, 0, 0, 0, 0, $square_size, $square_size, $new_width, $new_height);
  }


  // if no destination file was given then display a png
  if(!$destination_file){
    imagepng($square_image,NULL,9);
  }

  // save the smaller image FILE if destination file given
  if(substr_count(strtolower($destination_file), ".jpg")){
    imagejpeg($square_image,$destination_file,100);
  }
  if(substr_count(strtolower($destination_file), ".gif")){
    imagegif($square_image,$destination_file);
  }
  if(substr_count(strtolower($destination_file), ".png")){
    imagepng($square_image,$destination_file,9);
  }

  imagedestroy($original_image);
  imagedestroy($smaller_image);
  imagedestroy($square_image);



  return $thumbFilePath;
}
