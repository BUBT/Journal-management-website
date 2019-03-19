<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

// 上传 缩略图

// 成功时返回上传文件的 URL

use app\lib\UploadPort;

$upload_files_symbol = 'thumb';
$upload_remote_url = 'http://localhost:8081/src/upload/';
$server_remote_dir = '/src/upload/';

$remote = UploadPort::upload(
    $upload_files_symbol,
    $upload_remote_url,
    $server_remote_dir
);