<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

// 更新 发布文章 的 发布状态(is_issue) 并 添加标签

use app\data\Connection;

$conn = Connection::getInstance('../app/config/journalDB.php');

$dbname = 'journal';
$tbname = 'article';

$aid = 3;

$cols = [
    'is_issue'
];
$sql = 'UPDATE `journal`.`article` SET `is_issue` = 1 WHERE `aid` = ' . $aid;
$conn->query($sql);


$tbname = 'column';
$tid = 1;
$sql = 'INSERT INTO `journal`.`column`(`tid`, `aid`) VALUES (' . $tid . ',' . $aid . ')';
$conn->query($sql);