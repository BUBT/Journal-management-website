<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

// 输出所有 未发布 文章的信息列表：aid title recevied_date

use app\data\Connection;

$conn = Connection::getInstance('../app/config/journalDB.php');

$dbname = 'journal';
$tbname = 'article';
$cols = [
    'title',
    'recevied_date'
];

$sql = 'SELECT `aid`,`title`,`recevied_date` AS `time` FROM `journal`.`article` WHERE `is_issue` = 0';
$stmt = $conn->query($sql);
$arr = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($arr, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);