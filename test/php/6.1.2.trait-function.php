<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

use app\data\Connection;
use app\test\UseTrait;

$path = '../../app/config/testDB.php';
$connection = Connection::getInstance($path);
$trait = new UseTrait( $connection );
$list = $trait->listShow();
var_dump($list);
