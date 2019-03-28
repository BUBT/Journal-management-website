<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

use app\lib\Utils;

$url = 'http://localhost:8081/src/upload/upload_1553754651.jpg';
$format = Utils::get_file_mime($url);
// echo $format;// .jpeg

$url = 'http://localhost:8081/src/upload/remote_1553255978.webp';
$format = Utils::get_file_mime($url);
// echo $format;// .webp

$thumb = Utils::get_thumbnail_img($url, $_SERVER['DOCUMENT_ROOT'] . '/src/thumbs/thumb_' . time() . Utils::get_file_mime($url));
$path = Utils::path_to_url($thumb, 'http://localhost:8081/src/thumbs/');
echo $path;