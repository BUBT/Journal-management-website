<?php

// 显示某个目录下的所有特定类型文件，并输出其地址

require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

use app\lib\Files;

$path = $_SERVER['DOCUMENT_ROOT'] . '/src/upload/';
$url = 'http://localhost:8081/src/upload/';

$patten = '*.jpg|png';
// $patten = '*.doc|docx|md';

$arr = Files::displayFilesListInDir($path, $url, $patten);

echo json_encode( $arr, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT );