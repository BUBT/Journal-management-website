<?php

/**
 * 微信小程序端
 * 
 * 用户收藏列表
 * 路径：app/applet/user_favorite_list.php
 * 方法：myFavorites()
 * 
 * 返回：articles[ aid title favorite ]
 */


require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

use app\data\Connection;

$conn = Connection::getInstance('../config/journalDB.php');

$uid = $_GET['uid'] ?? 0;

if($uid != 0) {
    $sql = 'SELECT `aid`, `title` FROM `article` WHERE `aid` IN ( SELECT `aid` FROM `favorite` WHERE `uid` = ' . $uid . ')';
    $stmt = $conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    if($stmt) {
        foreach ($stmt as $key => $value) {
            $stmt[$key]['favorite'] = true;
        }
    } else {
        $stmt = null;   
    }

    echo json_encode($stmt, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
} else {
    $tips = '未收到数据！';
    echo json_encode($tips, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
}