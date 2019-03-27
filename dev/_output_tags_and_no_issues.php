<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

use app\data\Connection;

$conn = Connection::getInstance('../app/config/journalDB.php');

$dbname = 'journal';
$tbname = 'article';
$cols = [
    'title',
    'recevied_date'
];

$sql = 'SELECT `aid`,`title`,`recevied_date` AS `time` FROM `journal`.`article` WHERE `is_issue` = 0';
$stmt = $conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);

if($stmt) {
    $arr['issues'] = $stmt;
}

$sql = 'SELECT `tid`, `tag` FROM `tags`';
$stmt = $conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);

if($stmt) {
    $arr['tags'] = $stmt;
}

echo json_encode($arr, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
