<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

use app\lib\Utils;

$url = 'http://localhost:8081';
$path = $_SERVER['DOCUMENT_ROOT'];

// 成功
$original_img_path = '../../src/img/01.jpeg';

// 成功
$original_img_path = 'http://localhost:8081/src/img/01.jpeg';

// 连接超时：Fatal error: Maximum execution time of 30 seconds exceeded
// $original_img_path = 'https://www.google.com/logos/doodles/2019/spring-equinox-2019-northern-hemisphere-5139135894388736.2-s.png';

// 未定义的偏移量：Notice: Undefined offset: 18
$original_img_path = 'https://upload-images.jianshu.io/upload_images/3409462-54991503871b1d1a.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/489/format/webp';

// $original_img_path = 'https://avatars1.githubusercontent.com/u/37938141?s=460&v=4';
// $buffer = file_get_contents($original_img_path);
// $finfo = new finfo(FILEINFO_MIME_TYPE);
// var_dump($finfo->buffer($buffer));// string(10) "image/webp"


// echo Utils::get_file_mime($original_img_path);
// echo Utils::save_remote_img($original_img_path);

$thumbnails_img_path = $path . '/src/thumbs/thumb_' . time() . Utils::get_file_mime($original_img_path);
// echo $thumbnails_img_path;
Utils::get_thumbnail_img($original_img_path, $thumbnails_img_path, 200, 200);