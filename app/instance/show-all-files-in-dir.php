<?php

// 显示某个目录下的所有特定类型文件


require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

// use app\lib\Utils;
use app\lib\RemoteFiles;

$path = $_SERVER['DOCUMENT_ROOT'] . '/src/upload/';
$url = 'http://localhost:8081/src/upload/';
$patten = '*.jpg|png';

// $arr = Utils::show_all_files_in_dir( $path, $url, $patten );
$files = new RemoteFiles();
$arr = $files->displayFilesListInDir($path, $url, $patten);

echo json_encode( $arr, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT );