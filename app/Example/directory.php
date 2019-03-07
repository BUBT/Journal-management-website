<?php

require_once '../../vendor/autoload.php';

define('EXAMPLE_PATH', realpath(__DIR__ . '/../'));

$directory = new App\Iterator\Directory(EXAMPLE_PATH);
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