<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

use app\data\Connection;
use app\lib\Utils;
use app\lib\Remote;

$title = $_POST['title'] ?? '标题';
$author = $_POST['author'] ?? '作者';
$abstract = $_POST['abstract'] ?? '摘要';
$kw = $_POST['kw'] ?? '关键字';
$content = $_POST['content'] ?? '纯文本内容';
$html = $_POST['html'] ?? 'HTML字符串';

// 1.查询 HTML 字符串中的图片地址，并生成第一个图片的缩略图：200 x 200
$imgs = Utils::get_img_url_in_string( $html );
if( $imgs ) {
    
    $original_img_path = Utils::get_remote_img_and_save( $imgs[0], $_SERVER['DOCUMENT_ROOT'] . '/src/upload/');
    $img_format = Utils::get_file_format( $original_img_path );
    $thumbnail_img_width = 200;
    $thumbnail_img_height = 200;
    $thumbnail_img_path = $_SERVER['DOCUMENT_ROOT'] . '/src/thumbs/'
     . $title . '_' . $author . '_' 
     . time() . '_' . $thumbnail_img_width . '_' 
     . $thumbnail_img_height . $img_format;

    Utils::get_thumbnail_img( $original_img_path, $thumbnail_img_path, $thumbnail_img_width, $thumbnail_img_height );
    $first_img = $thumbnail_img_path;

} else {
    $first_img = NULL;
}


// 2.保存 HTML 字符串至文件
$file_dir = $_SERVER['DOCUMENT_ROOT'] . '/src/issues/';
// $file_dir = 'http://localhost:8081' . '/src/issues/';
$file_name = $title . '_' . $author . '_' . time();
$file_type = 'html';
$file_url = Utils::save_data_to_file( $html, $file_type, $file_dir, $file_name );

// 3.保存数据至数据库记录(暂不保存)
$db_name = '`journal`';
$table_name = '`article`';
$table_cols = array(
    '`title`', '`author`', '`abstract`', '`keywords`', '`content`', '`first_img`', '`file_url`'
);
$table_col_values = array(
    $title, $author, $abstract, $kw, $content, $first_img, $file_url
);
$insert_sql = 'INSERT INTO ' . $db_name . '.' . $table_name . '(' . implode(',', $table_cols) . ') VALUES(' ."'" . implode("','", $table_col_values ) . "')";
$conn = Connection::getInstance();
$conn->query( $insert_sql );


echo json_encode( $insert_sql, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);