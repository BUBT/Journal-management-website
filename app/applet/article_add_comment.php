<?php

/**
 * 微信小程序端
 * 
 * 添加评论
 * 路径：app/applet/article_add_comment.php
 * 方法：comment()
 * 
 * 返回：添加结果（true/false）
 */


require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

use app\data\Connection;

$conn = Connection::getInstance('../config/journalDB.php');

$aid = $_GET['aid'] ?? 0;
$uid = $_GET['uid'] ?? 0;
$comment = $_GET['comment'] ?? '';

if($aid != 0 && $uid != 0 && $comment != '') {
    // 向评论表中添加记录
    $sql = 'INSERT INTO `comment`(`aid`, `uid`, `comment`) VALUES(' . $aid . ',' . $uid . ',' . "'" . $comment . "')";
    $stmt = $conn->query($sql)->fetch();
    if($stmt) {
        echo json_encode(true);
    } else {
        echo json_encode(false);
    }

} else {
    $tips = '未接收到数据！';
    echo json_encode($tips, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
}