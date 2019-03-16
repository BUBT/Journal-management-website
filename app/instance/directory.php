<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

use app\iterator\Directory;

define('EXAMPLE_PATH', realpath(__DIR__ . '/../'));

$directory = new Directory(EXAMPLE_PATH);
try {
    echo 'Mimics "ls -l -R" ' . PHP_EOL;
    foreach ( $directory->ls('*.php') as $info ) {
        echo $info;
    }

    echo 'Mimics "dir /s" ' . PHP_EOL;
    foreach ($directory->dir('*.php') as $info) {
        echo $info;
    }
} catch (Throwable $e) {
    echo $e->getMessage();
}