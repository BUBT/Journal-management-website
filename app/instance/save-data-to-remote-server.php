<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

use app\lib\Remote;

$data = 'dsdsdjskdjadsjdnadsa';
$type = 'html';
$filename = time() . '.' . $type;
// $url = 'http://www.lynnzh.top/upload.php';
$url = 'http://localhost/app/instance/upload.php';

$remote = Remote::upload_text(
    $data, 
    $type, 
    $filename, 
    $url
);

// var_dump($remote);
echo $remote;