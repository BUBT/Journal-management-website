<?php

require_once dirname(__DIR__) . '/vendor/autoload.php';

// 保存文章存稿信息至数据库

use app\data\Connection;
use app\lib\Remote;
use app\lib\Utils;

$title = $_POST['title'] ?? '标题';
$author = $_POST['author'] ?? '作者';
$abstract = $_POST['abstract'] ?? '摘要';
$kw = $_POST['kw'] ?? '关键字';
$content = $_POST['content'] ?? '纯文本内容';
$html = $_POST['html'] ?? 'HTML字符串';

$url = Remote::upload_text($html, 'html', $title . '_' . $author . '.html', 'http://localhost:8081/Journal-management-website/dev/_upload_text.php');
$imgsArr = Utils::get_img_url_in_string($html);
if($imgsArr) {
    $imgPath = Utils::get_thumbnail_img($imgsArr[0], dirname(__DIR__) . '/src/thumbs/thumb_' . time() . Utils::get_file_mime($imgsArr[0]));
    $img = Utils::path_to_url($imgPath, 'http://localhost:8081/Journal-management-website/src/thumbs/');
} else {
    $img = NULL;
}

// $title = '标题';
// $author = '作者';
// $abstract = '摘要';
// $kw = '关键字';
// $content = '内容';
// $img = 'http://localhost:8081/src/thumbs/thumb_test.jpg';
// $url = 'http://localhost:8081/src/issues/标题_作者_testd8923232.html';


$config = dirname(__DIR__) . '/app/config/journalDB.php';
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
// echo $sql;
$res = $conn->query($sql);
echo json_encode($res, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);