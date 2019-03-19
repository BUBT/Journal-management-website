<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

$url = $_POST['delete'] ?? '';
// $path = 'http://localhost:8081/src/upload/upload_1552980029.png';
if($url) {
    // echo '非空';
    // echo basename($path);
    $path = $_SERVER['DOCUMENT_ROOT'] . '/src/upload/' . basename($url);
    unlink($path);
    echo json_encode('拒绝成功', JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
} else {
    echo '空字符串或者变量未定义';
}