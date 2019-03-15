<?php

// 获取缩略图并保存

$original_img_path = $_SERVER['DOCUMENT_ROOT'] . '/src/img/01.jpeg';
$thumbnail_img_width = 200;
$thumbnail_img_height = 200;
$thumbnail_img_path = $_SERVER['DOCUMENT_ROOT'] . '/src/thumbs/' . 'thumbnail_' . $thumbnail_img_width . '_' . $thumbnail_img_height . '.jpeg';

get_thumbnail_img( $original_img_path, $thumbnail_img_path, $thumbnail_img_width, $thumbnail_img_height );
header("content-type:image/png");
echo file_get_contents( $thumbnail_img_path );
echo '<br>';


function get_thumbnail_img( $original_img_path, $thumbnail_img_path, $thumbnail_img_width, $thumbnail_img_height )
{
  $temp = array(
    1=>'gif', 
    2=>'jpeg', 
    3=>'png'
  );
  list( $original_img_width, $original_img_height, $tmp ) = getimagesize( $original_img_path );
  if( !$temp[$tmp] ){
    return false;
  }
  $tmp = $temp[$tmp];
  $infunc = "imagecreatefrom$tmp";
  $outfunc = "image$tmp";
  $original_img = $infunc( $original_img_path );
  if( $original_img_width / $thumbnail_img_width > $original_img_height / $thumbnail_img_height ){
    $thumbnail_img_height = $thumbnail_img_width *( $original_img_height / $original_img_width );
  }else{
    $thumbnail_img_width = $thumbnail_img_height * ( $original_img_width / $original_img_height );
  }
  $thumbnail_img = imagecreatetruecolor( $thumbnail_img_width, $thumbnail_img_height );
  imagecopyresampled( $thumbnail_img, $original_img, 0, 0, 0, 0, $thumbnail_img_width, $thumbnail_img_height, $original_img_width, $original_img_height );
  if( $outfunc( $thumbnail_img, $thumbnail_img_path ) ){
    return true;
  }else{
    return false;
  }
}
