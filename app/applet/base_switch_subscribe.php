<?php

/**
 * 微信小程序端
 * 
 * 用户添加/取消订阅
 * 路径：app/applet/base_switch_subscribe.php
 * 方法：switchSubscribe()
 * 
 * 返回：该用户对该栏目的订阅状态
 */


require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

use app\data\Connection;

$conn = Connection::getInstance('../config/journalDB.php');

$uid = $_GET['uid'] ?? 0;
$tid = $_GET['tid'] ?? 0;
$subscribe = $_GET['subscribe'] ?? false;

if($uid != 0) {
    if($subscribe == 'true') {
        // 用户已订阅，则删除订阅
        delSubscribe($uid, $tid);
        echo json_encode(false, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    } elseif($subscribe == 'false') {
        // 用户未订阅，则添加订阅
        addSubscribe($uid, $tid);
        echo json_encode(true, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }
    // echo json_encode(true, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
} else {
    $tips = '未收到数据！';
    echo json_encode($tips, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
}


function delSubscribe($uid, $tid)
{
    global $conn;
    $sql = 'DELETE FROM `subscribe` WHERE `uid` = ' . $uid . ' AND `tid` = ' . $tid;
    $conn->query($sql);
}

function addSubscribe($uid, $tid)
{
    global $conn;
    $sql = 'INSERT INTO `subscribe`(`uid`, `tid`) VALUES(' . $uid . ', ' . $tid . ')';
    $conn->query($sql);
}