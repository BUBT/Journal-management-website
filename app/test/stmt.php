<?php

// require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

// use app\data\Connection;

echo timeInterval('2018-05-20 02:10:18');

function timeInterval($time = '2019-03-18 02:10:18')
{
    $time = strtotime($time);
    $interval = (time() - $time);
    // return $interval;

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