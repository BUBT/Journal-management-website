<?php

require_once dirname(__DIR__) . '/vendor/autoload.php';

use app\lib\UploadPort;

$issues = UploadPort::upload(
    'issues',
    'http://localhost:8081/Journal-management-website/src/issues/',
    dirname(__DIR__) . '/src/issues/'
);