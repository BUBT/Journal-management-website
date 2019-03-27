<?php

/**
 * 微信小程序端
 * 
 * 搜索
 * 路径：app/applet/search.php
 * 方法：onSearch()
 * 
 * 返回：搜索结果集 results{
 *  'column'[]
 *  'articles'[]
 * }
 */


require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

use app\data\Connection;
use Fukuball\Jieba\Jieba;
use Fukuball\Jieba\Finalseg;

ini_set('memory_limit', '1024M');
Jieba::init();
Finalseg::init();

$conn = Connection::getInstance('../config/journalDB.php');

$kw =  $_GET['kw'] ?? '';
$uid = $_GET['uid'] ?? 0;

if($kw) {
    $res = search($kw);
    
    if($uid != 0 && $res['articles']) {
        foreach ($res['articles'] as $key => $value) {
            $sql = 'SELECT `fid` FROM `favorite` WHERE `aid`  = ' . (int)$value['aid'] . ' AND `uid` = ' . $uid;
            $stmt = $conn->query($sql)->fetch();
            if($stmt) {
                $res['articles'][$key]['favorite'] = true;
            }
        }   
    }

    echo json_encode($res, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
} else {
    $tips = '未收到数据！';
    echo json_encode($tips, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
}


// =====================================================================

function search($kw)
{
    global $conn;
    $part = Jieba::cutForSearch($kw);
    $res = array(
        'column'=>array(),
        'articles'=>array()
    );

    // 1.在 tags 表中查询
    $tags = array();
    foreach ($part as $key => $value) {
        $sql1 = "SELECT `tid`, `tag` FROM `tags` WHERE instr(`tag`, '$value') > 0 ORDER BY `tid`";
        $stmt = $conn->query($sql1)->fetchAll(PDO::FETCH_ASSOC);
        if($stmt) {
            foreach ($stmt as $key => $value) {
                $tags[] = $value;
            }            
        }
    }
    $res['column'] = $tags;

    // 2.在 article 表中查询
    $articles = array();
    foreach ($part as $key => $value) {
        $sql2 = "SELECT `aid`,`title`,`abstract`,`first_img` FROM `article` WHERE instr(CONCAT(`title`,`abstract`), '$value') > 0 ORDER BY `view`";
        $stmt = $conn->query($sql2)->fetchAll(PDO::FETCH_ASSOC);
        
        if($stmt) {
            foreach ($stmt as $key => $value) {
                $value['favorite'] = false;
                $articles[] = $value;
            }
        }
    }
    $res['articles'] = $articles;

    return $res;
}