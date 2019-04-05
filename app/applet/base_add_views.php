<?php

/**
 * 微信小程序端
 * 
 * 增加浏览量
 * 路径：app/applet/base_add_views.php
 * 方法：addViews()
 * 
 * 返回：无返回值
 */


require_once dirname(dirname(__DIR__)) . '/vendor/autoload.php';

use app\data\Connection;

$aid = $_GET['aid'] ?? '';

if($aid) {
    $conn = Connection::getInstance(dirname(__DIR__) . '/config/journalDB.php');

    $sql = 'UPDATE `article` SET `view` = `view` + 1 WHERE `aid` = ' . $aid;
    $stmt = $conn->query($sql);
    echo json_encode(true, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
} else {
    $tips = '未接收到数据！';
    echo json_encode($tips, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
}