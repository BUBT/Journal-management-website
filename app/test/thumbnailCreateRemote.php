<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

use app\lib\Utils;

$url = 'http://localhost:8081';
$path = $_SERVER['DOCUMENT_ROOT'];


$original_img_path = '../../src/img/01.jpeg';

$original_img_path = 'https://upload-images.jianshu.io/upload_images/3409462-54991503871b1d1a.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/489/format/webp';
$tmp_name = time() . '.png';
file_put_contents($tmp_name, file_get_contents($original_img_path));


$img_format = Utils::get_file_format( basename($tmp_name) );
$thumb_dir = '/src/thumbs/thumb_' . time() . $img_format;

Utils::get_thumbnail_img(
    $tmp_name,
    $path . $thumb_dir,
    200,
    200
);

echo $url . $thumb_dir;