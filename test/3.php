<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

use app\data\Connection;

// $conn = Connection::getInstance('./../app/config/testDB.php');
$conn = Connection::getInstance('./../app/config/journalDB.php');


$arr = [
    'type' => 'mysql',
    'host' => 'localhost:8081',
    'port' => 3306,
    'dbname' => 'test',
  
    'dsn' => 'mysql:host=host;port=port;dbname=dbname',
    'username' => 'root',
    'userpwd' => 'mysql',
    'charset' => 'utf8'
    
];

echo $arr['dsn'];