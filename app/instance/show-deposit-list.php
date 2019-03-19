<?php

// 显示某个目录下的所有特定类型文件


require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

use app\lib\Utils;

$path = $_SERVER['DOCUMENT_ROOT'] . '/src/issues/';
$url = 'http://localhost:8081/src/issues/';
$patten = '*.html';

$arr = Utils::show_all_files_in_dir( $path, $url, $patten );

echo json_encode( $arr, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT );