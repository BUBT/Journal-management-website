<?php

require_once '../vendor/autoload.php';

use App\Data\Connection;
use App\Test\UseTrait;

$connection = Connection::getInstance('../app/Config/testDB.php');
$trait = new UseTrait( $connection );
$list = $trait->listShow();
var_dump($list);
