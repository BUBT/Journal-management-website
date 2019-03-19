<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

use app\lib\Utils;
use app\lib\Remote;

// $remote_url = 'http://localhost:8081/src/img/01.jpeg';
// // $thumbnail_img_full_path = $_SERVER['DOCUMENT_ROOT'] . '/src/thumbs/thumbnail_' . time() . '.jpg';
// $thumbnail_img_full_path = 'http://localhost/src/thumbs/thumbnail_' . time() . '.jpg';

// $test = Utils::get_thumbnail_img(
//     $remote_url,
//     $thumbnail_img_full_path,
//     200,
//     200
// );


$upload_server_url = 'http://localhost:8081/dev/upload_thumb.php';
$files_symbol = 'thumb';

$_FILES[$files_symbol]['tmp_name'] = 'http://localhost:8081/src/img/01.jpeg';

$remote  = Remote::upload_image(
    $upload_server_url,
    $files_symbol
);

var_dump($remote);