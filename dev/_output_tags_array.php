<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

// 输出所有标签，包括 tid tag
// 返回数组

use app\data\Connection;

$conn = Connection::getInstance('../app/config/journalDB.php');
$sql = 'SELECT `tid`, `tag` FROM `tags`';
$stmt = $conn->query($sql);
$arr = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($arr, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
// print_r($arr);