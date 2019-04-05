<?php

/**
 * 微信小程序端
 * 
 * 获取 所有的栏目列表 及其文章列表
 * 路径：app/applet/column_tags_list.php
 * 方法：allSections()
 * 
 * 返回：tags[tid tag subscribe articles[ aid title abstract first_img author recevied_date favorite ] ] 
 */


require_once dirname(dirname(__DIR__)) . '/vendor/autoload.php';

use app\data\Connection;
use app\lib\Utils;

$uid = $_GET['uid'] ?? 0;

$conn = Connection::getInstance(dirname(__DIR__) . '/config/journalDB.php');

// 1.所有的tags
$sql = 'SELECT * FROM `tags`';
$stmt = $conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);

// 2.初始化栏目订阅状态，特定 tag 下的文章列表
foreach ($stmt as $key => $value) {
    $stmt[$key]['subscribe'] = false;

    $sql2 = 'SELECT `aid` FROM `column` WHERE `tid` = ' . $value['tid'];
    $stmt2 = $conn->query($sql2)->fetchAll(PDO::FETCH_ASSOC);

    if ($stmt2) {
        $arr = array();
        foreach ($stmt2 as $key2 => $value2) {
            $arr[] = $value2['aid'];
        }
        $sql3 = 'SELECT `aid`, `title`, `abstract`, `author`, `first_img`, `view`, `star`, `recevied_date` AS `time` FROM `article` WHERE `is_issue` = 1 AND `aid` IN(' . implode(",", $arr) . ')';
        $stmt3 = $conn->query($sql3)->fetchAll(PDO::FETCH_ASSOC);

        // 3.处理发布时间和初始化收藏状态
        foreach ($stmt3 as $key3 => $value3) {
            $stmt3[$key3]['time'] = Utils::timeInterval($value3['time']);
            $stmt3[$key3]['favorite'] = false;
        }

        $stmt[$key]['articles'] = $stmt3;
    } else {
        $stmt[$key]['articles'] = null;
    }
}

// 4.处理订阅状态及收藏状态
if($uid != 0) {
    foreach ($stmt as $key => $value) {
        $sql4 = 'SELECT `sid` FROM `subscribe` WHERE `uid` = ' . $uid . ' AND `tid` = ' . $value['tid'];
        $stmt4 = $conn->query($sql4)->fetch();
        if($stmt4) {
            $stmt[$key]['subscribe'] = true;
        }

        if($value['articles']) {
            foreach ($stmt[$key]['articles'] as $key1 => $value1) {
                $sql5 = "SELECT `fid` FROM `favorite` WHERE `uid` = " . $uid . " AND `aid` = " . $value1['aid'];
                $stmt5 = $conn->query($sql5)->fetch();
                if($stmt5) {
                    $stmt[$key]['articles'][$key1]['favorite'] = true;
                }
            }
        }
    }
}


echo json_encode($stmt, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);