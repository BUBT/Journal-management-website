<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

use app\lib\UploadPort;

$issues = UploadPort::upload(
    'issues',
    'http://localhost:8081/src/issues/',
    '../src/issues/'
);