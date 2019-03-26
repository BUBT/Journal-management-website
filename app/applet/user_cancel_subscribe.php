<?php

/**
 * 微信小程序端
 * 
 * 用户取消订阅
 * 路径：app/applet/user_cancel_subscribe.php
 * 方法：cancelSubscribe()
 * 
 * 返回：无返回值
 */


require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

use app\data\Connection;

$conn = Connection::getInstance('../config/journalDB.php');

$uid = $_GET['uid'] ?? 0;
$tid = $_GET['tid'] ?? 0;

if($uid != 0) {
    $sql = 'DELETE FROM `subscribe` WHERE `uid` = ' . $uid . ' AND `tid` = ' . $tid;
    $stmt = $conn->query($sql);

    // echo json_encode($stmt, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
} else {
    $tips = '未收到数据！';
    echo json_encode($tips, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
}