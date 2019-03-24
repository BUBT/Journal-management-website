<?php

/**
 * 微信小程序端
 * 
 * 切换“喜欢”状态
 * 路径：app/applet/base_switch_favorite.php
 * 方法：like()
 * 
 * 返回：该用户现在对该文章的喜爱状态
 */


require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

use app\data\Connection;

$conn = Connection::getInstance('../config/journalDB.php');

$uid = $_GET['uid'] ?? 1;
$aid = $_GET['aid'] ?? 1;
$favorite = $_GET['favorite'] ?? false;

if($uid && $aid) {
    if($favorite == 'true') {
        // 用户已喜欢该文章，则切换为不喜欢
        delFavorite($uid, $aid);
        echo json_encode(false, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    } elseif($favorite == 'false') {
        addFavorite($uid, $aid);
        echo json_encode(true, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        // echo addFavorite($uid, $aid);
    }
} else {
    $tips = '未接收到数据！';
    echo json_encode($tips, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
}

function delFavorite($uid = 1, $aid = 1)
{
    global $conn;
    $sql = 'DELETE FROM `journal`.`favorite` WHERE `uid` = ' . $uid . ' AND `aid` = ' . $aid;
    $conn->query($sql);
    // return true;
}

function addFavorite($uid = 1, $aid = 1)
{
    global $conn;
    $sql = 'INSERT INTO `journal`.`favorite`(`uid`, `aid`) VALUES(' . $uid . ', ' . $aid . ')';
    $conn->query($sql);
    // return true;
    // return $sql;
}