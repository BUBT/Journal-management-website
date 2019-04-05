<?php

require_once dirname(__DIR__) . '/vendor/autoload.php';

$url = $_POST['delete'] ?? '';
// $path = 'http://localhost:8081/src/upload/upload_1552980029.png';
if($url) {
    // echo '非空';
    // echo basename($path);
    $path = dirname(__DIR__) . '/src/upload/' . basename($url);
    unlink($path);
    echo json_encode('拒绝成功', JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
} else {
    echo '空字符串或者变量未定义';
}