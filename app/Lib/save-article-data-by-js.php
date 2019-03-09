<?php

require_once '../../vendor/autoload.php';

use App\Data\Connection;
use App\Lib\Utils;

$title = $_POST['title'] ?? '标题';
$author = $_POST['author'] ?? '作者';
$abstract = $_POST['abstract'] ?? '摘要';
$kw = $_POST['kw'] ?? '关键字';
$content = $_POST['content'] ?? '纯文本内容';
$html = $_POST['html'] ?? 'HTML字符串';

// 1.查询 HTML 字符串中的图片地址
$imgs = Utils::get_img_url_in_string( $html );



// $conn = Connection::getInstance();

echo json_encode( $imgs, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);