<?php

/**
 * 微信小程序端
 * 
 * 获取 单个 column 的 所有 article 信息及 tag
 * 路径：app/applet/column_get_articles.php
 * 方法：specialColumn()
 * 
 * 返回：tag subscribe articles[ aid title abstract first_img author recevied_date favorite ]
 */


require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

use app\data\Connection;
use app\lib\Utils;

$tid = $_GET['tid'] ?? 0;
$uid = $_GET['uid'] ?? 0;

$conn = Connection::getInstance('../config/journalDB.php');

if($tid != 0) {
    $sql = 'SELECT `tag` FROM `tags` WHERE `tid` = ' . $tid;
    $stmt = $conn->query($sql)->fetch(PDO::FETCH_ASSOC);
    if($stmt) {
        $stmt['tid'] = $tid;

        $sql2 = 'SELECT `aid` FROM `column` WHERE `tid` = ' . $tid;
        $stmt2 = $conn->query($sql2)->fetchAll(PDO::FETCH_ASSOC);
        if($stmt2) {
            foreach ($stmt2 as $key => $value) {
                $arr[] = $value['aid'];
            }
            $sql3 = 'SELECT `aid`, `title`, `abstract`, `author`, `first_img`, `view`, `star` AS `img`, `recevied_date` AS `time` FROM `article` WHERE `is_issue` = 1 AND `aid` IN(' . implode(",", $arr) . ')';
            $stmt3 = $conn->query($sql3)->fetchAll(PDO::FETCH_ASSOC);
            foreach ($stmt3 as $key => $value) {
                $stmt3[$key]['time'] = Utils::timeInterval($value['time']);
            }
            $stmt['articles'] = $stmt3;
        } else {
            $stmt['articles'] = null;
        }
        
    }

    if($uid != 0) {
        $sql4 = 'SELECT `sid` FROM `subscribe` WHERE `uid` = ' . $uid . ' AND `tid` = ' . $tid;
        $stmt4 = $conn->query($sql4)->fetch();
        if($stmt4) {
            $stmt['subscribe'] = true;
        } else {
            $stmt['subscribe'] = false;
        }
        if($stmt['articles']) {
            foreach ($stmt['articles'] as $key => $value) {
                $sql5 = "SELECT `fid` FROM `favorite` WHERE `uid` = " . $uid . " AND `aid` = " . $value['aid'];
                $stmt5 = $conn->query($sql5)->fetch();
                if($stmt5) {
                    $stmt['articles'][$key]['favorite'] = true;
                } else {
                    $stmt['articles'][$key]['favorite'] = false;
                }
            }
        }
    } else {
        $stmt['subscribe'] = false;
    }

    // var_dump($stmt2);
    echo json_encode($stmt, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
}
