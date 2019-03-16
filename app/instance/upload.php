<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

use app\lib\UploadPort;

$remote = UploadPort::upload(
    'http://localhost/src/upload/',
    // $_SERVER['DOCUMENT_ROOT'] . '/src/upload/',
    // 'remote'
);