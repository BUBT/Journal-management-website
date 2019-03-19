<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

// 保存文章存稿信息至数据库

use app\data\Connection;

$title = '标题';
$author = '作者';
$abstract = '摘要';
$kw = '关键字';
$content = '内容';
$img = 'http://localhost:8081/src/thumbs/thumb_test.jpg';
$url = 'http://localhost:8081/src/issues/标题_作者_testd8923232.html';


$config = $_SERVER['DOCUMENT_ROOT'] . '/app/config/journalDB.php';
$conn = Connection::getInstance($config);

$dbname = 'journal';
$tbname = 'article';
$cols =  [
    'title',
    'author',
    'abstract',
    'keywords',
    'content',
    'first_img',
    'file_url'
];

$vals = [
    $title,
    $author,
    $abstract,
    $kw,
    $content,
    $img,
    $url
];

$sql = 'INSERT INTO ' . $dbname . '.' . $tbname . '(`' . implode('`,`', $cols) . '`) VALUES(' ."'" . implode("','", $vals ) . "')";
echo $sql;