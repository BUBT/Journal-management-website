<?php

// 获取URL远程图片并保存

function get_remote_img_and_save( $url_string )
{
    $fn = $_SERVER['DOCUMENT_ROOT'] . '/src/upload/remote_img_' . time() . '.jpg';
    file_put_contents( $fn, file_get_contents( $url_string ));
}

$url_string = 'https://avatars1.githubusercontent.com/u/37938141?s=460&v=4';
$url_string = 'https://upload.jianshu.io/admin_banners/web_images/4615/62909ce23863ac5f6a1454c7ba407b85af0a17db.png?imageMogr2/auto-orient/strip|imageView2/1/w/1250/h/540'; // 超时

get_remote_img_and_save( $url_string );