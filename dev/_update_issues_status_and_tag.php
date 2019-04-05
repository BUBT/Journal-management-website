<?php

require_once dirname(__DIR__) . '/vendor/autoload.php';

// 更新 发布文章 的 发布状态(is_issue) 并 添加标签

use app\data\Connection;

$conn = Connection::getInstance(dirname(__DIR__) . '/app/config/journalDB.php');

$aids = $_POST['aids'] ?? '';
$tids = $_POST['tids'] ?? '';

if($aids && $tids) {
    $sql = 'UPDATE `article` SET `is_issue` = 1 WHERE `aid` IN(' . $aids . ')';
    $conn->query($sql);
    
    $aids = explode(',', $aids);
    $tids = explode(',', $tids);
    
    foreach ($aids as $key => $aid) {
        $sql = 'INSERT INTO `column`(`tid`, `aid`) VALUES (' . $tids[$key] . ',' . $aid . ')';
        $conn->query($sql);
    }

    echo json_encode(true, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
} else {
    echo json_encode('接收数据失败！', JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
}