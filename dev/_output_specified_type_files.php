<?php

// 显示某个目录下的所有特定类型文件，并输出其地址

require_once dirname(__DIR__) . '/vendor/autoload.php';

use app\lib\Files;

$path = dirname(__DIR__) . '/src/upload/';
$url = 'http://localhost:8081/Journal-management-website/src/upload/';

$patten = '*.jpg|png';
// $patten = '*.doc|docx|md';

$arr = Files::displayFilesListInDir($path, $url, $patten);

echo json_encode( $arr, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT );