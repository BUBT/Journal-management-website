<?php

/**
 * 微信小程序端
 * 
 * 近期热门数据
 * 路径：app/applet/index_recently_popular.php
 * 方法：recentlyPopular()
 * 
 * 返回：最新发布文章列表(aid title abstract first_img author recevied_date is_favorite tag )
 */


require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

use app\data\Connection;


$uid = $_GET['uid'] ?? '';

$conn = Connection::getInstance('../config/journalDB.php');
$sql = 'SELECT `aid`, `title`, `abstract`, `author`, `first_img`, `view`, `star`, `recevied_date` AS `time` FROM `article` WHERE `is_issue` = 1 ORDER BY `view`';
$stmt = $conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
if($stmt) {
    foreach ($stmt as $key => $value) {
        $stmt[$key]['favorite'] = false;
        $stmt[$key]['time'] = timeInterval($stmt[$key]['time']);
        $stmt[$key]['col'] = tagOfArticle($stmt[$key]['aid']);
    }
}
if($uid) {
    foreach ($stmt as $key => $value) {
        $stmt[$key]['favorite'] = isFavorite($uid, $stmt[$key]['aid']);
    }
}

echo json_encode($stmt, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);


/**
 * isFavorite()          查询用户是否收藏该文章
 *
 * @param string $uid    用户 ID
 * @param string $aid    文章 ID
 * @return boolean       返回布尔值
 */
function isFavorite($uid = '', $aid = '')
{
    global $conn;
    $sql = "SELECT `fid` FROM `favorite` WHERE `uid` = " . $uid . " AND `aid` = " . $aid;
    // $conn = Connection::getInstance('../config/journalDB.php');
    $stmt = $conn->query($sql)->fetch();
    if($stmt) {
        return true;
    }
    return false;
}


/**
 * tagOfArticle()          查询文章所属栏目
 *
 * @param integer $aid     文章 ID
 * @return void            返回文章所属栏目数组[tid tag]
 */
function tagOfArticle($aid = 1)
{
    global $conn;
    $sql = 'SELECT `tid`,`tag` FROM `tags` WHERE `tid` = (SELECT `tid` FROM `column` WHERE `aid` = ' . $aid . ')';
    $stmt = $conn->query($sql)->fetch(PDO::FETCH_ASSOC);
    return $stmt;
}


/**
 * timeInterval()         距离现在的时间间隔
 *
 * @param string $time    时间字符串
 * @return void           返回时间间隔字符串
 */
function timeInterval($time = '2019-03-18 02:10:18')
{
    $time = strtotime($time);
    $interval = (time() - $time);
    if($interval < 60) {
        return $interval . ' 秒前';
    } elseif(60 < $interval && $interval < 60*60) {
        return round($interval / 60) . ' 分钟前';
    } elseif(60*60 < $interval && $interval < 60*60*24) {
        return round($interval / (60*60)) . ' 小时前';
    } elseif(60*60*24 < $interval && $interval < 60*60*24*30) {
        return round($interval / (60*60*24)) . ' 天前';
    } elseif(60*60*24*30 < $interval && $interval < 60*60*24*30*12) {
        return round($interval / (60*60*24*30)) .  ' 个月前';
    } else {
        return round($interval / (60*60*24*365)) .  ' 年前';
    }
}