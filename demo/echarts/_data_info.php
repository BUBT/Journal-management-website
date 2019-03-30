<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

use app\data\Connection;

$conn = Connection::getInstance('../../app/config/journalDB.php');

echo json_encode(main(), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

// echo get_articles_views_under_a_column(1)['views'] . PHP_EOL;
// echo get_articles_views_under_a_column(1)['num'] . PHP_EOL;

// echo get_total_of_subscribe_for_a_column(1);

function main()
{
    $res = array();
    $tids = get_all_tags_info()['tid'];
    $tags = get_all_tags_info()['tag'];
    foreach ($tids as $key => $value) {
        // $res[$tags[$key]]['tid'] = $value;
        $res[$key]['tag'] = $tags[$key];
        $res[$key]['views'] = get_articles_views_under_a_column($value)['views'];
        $res[$key]['subs'] = get_total_of_subscribe_for_a_column($value);
        $res[$key]['articles'] = get_articles_views_under_a_column($value)['num'];
    }

    return $res;
}


/**
 * 获取所有的栏目ID 及 tag
 *
 * @return void
 */
function get_all_tags_info()
{
    global $conn;
    $sql = 'SELECT `tid`,`tag` FROM `tags`';
    $stmt = $conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    if($stmt) {
        foreach ($stmt as $key => $value) {
            $arr['tid'][] = $value['tid'];
            $arr['tag'][] = $value['tag'];

            // $arr[$value['tid']] = $value['tag'];
        }
        return $arr;
    }
    return false;
}

/**
 * 获取某个栏目的订阅量
 *
 * @param integer $tid   栏目 ID
 * @return void          返回订阅量
 */
function get_total_of_subscribe_for_a_column($tid = 0)
{
    global $conn;
    $subs = 0;
    $sql = 'SELECT COUNT(*) FROM `column` WHERE `tid` = ' . $tid;
    $stmt = $conn->query($sql)->fetch(PDO::FETCH_ASSOC);
    if($stmt) {
        // $subs += PDO::rowCount($stmt);
        $subs += $stmt['COUNT(*)'];
    }
    return $subs;
    // return $stmt;
}

/**
 * 查询特定栏目下的所有文章的浏览总量和文章总量
 *
 * @param integer $tid      栏目 ID
 * @return void             返回浏览总量和文章总量的数组
 */
function get_articles_views_under_a_column($tid = 0)
{
    global $conn;
    $views = 0;
    $num = 0;
    $sql = 'SELECT `view` FROM `article` WHERE `aid` IN( SELECT `aid` FROM `column` WHERE `tid` = ' . $tid .')';
    $stmt = $conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    if($stmt) {
        foreach ($stmt as $key => $value) {
            $views += $value['view'];
            $num++;
        }
    }
    return [
        'views' => $views,
        'num' => $num
    ];
}