<?php

/**
 * 微信小程序端
 * 
 * 用户订阅列表
 * 路径：app/applet/user_subscribe_list.php
 * 方法：mySubscribes()
 * 
 * 返回：subscribes[tid tag subscribe]
 */


require_once dirname(dirname(__DIR__)) . '/vendor/autoload.php';

use app\data\Connection;

$conn = Connection::getInstance(dirname(__DIR__) . '/config/journalDB.php');

$uid = $_GET['uid'] ?? 0;

if($uid != 0) {
    $sql = 'SELECT `tid`, `tag` FROM `tags` WHERE `tid` IN ( SELECT `tid` FROM `subscribe` WHERE `uid` = ' . $uid . ')';
    $stmt = $conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    if($stmt) {
        foreach ($stmt as $key => $value) {
            $stmt[$key]['subscribe'] = true;
        }
    } else {
        $stmt = null;   
    }

    echo json_encode($stmt, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
} else {
    $tips = '未收到数据！';
    echo json_encode($tips, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
}