<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

// 保存 HTML 字符串至远程服务器并输出其 URL 地址

use app\lib\Remote;

$data = 'dsdsdjskdjadsjdnadsa';
$type = '.html';
$filename = time() . $type;
$url = 'http://localhost:8081/dev/_upload_text.php';
$files_symbol = 'issues';

$file_url = Remote::upload_text(
    $data, 
    $type, 
    $filename, 
    $url,
    $files_symbol
);

echo json_encode($file_url, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);