<?php

// 显示某个目录下的所有特定类型文件


require_once '../../vendor/autoload.php';

use App\Lib\Utils;

$path = $_SERVER['DOCUMENT_ROOT'] . '/src/upload/';

$arr = Utils::show_all_files_in_dir( $path, '*.jpg' );

echo json_encode( $arr, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT );