<?php

// // 富文本编辑器 wangEditor 图片上传服务器处理

require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

use app\lib\Remote;

$remote = Remote::upload_image(
    // 'http://localhost/app/instance/upload.php',
    'http://localhost:8081/dev/_upload_image.php',
    'upload'
);

if($remote) {
    $result = Array(
        'errno'=>0,
        'data'=>Array($remote)
    );
    echo json_encode($result, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
} else {
    echo json_encode('服务器好像出了点问题，图片插入失败了。', JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
}