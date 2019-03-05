<?php

// 富文本编辑器 wangEditor 图片上传服务器处理

# 上传文件夹位置：仅允许使用$_SERVER['DOCUMENT_ROOT']而不能使用虚拟网址类如http://localhost/upload/img/
$dir = $_SERVER['DOCUMENT_ROOT'].'/src/data/img/';

# 读取显示图片文件位置，仅允许虚拟地址，其地址和$upuloadDir一样，但是浏览器安全策略不允许读取绝对地址
//$url = 'https://www.lynnzh.top/upload/img/';
$url = 'http://localhost:8081/src/data/img/';

if (!file_exists($dir)) {
    @mkdir($dir);
}

$name = $_FILES['upload']['name'];
$type = $_FILES['upload']['type'];
$size = $_FILES['upload']['size'];
$tmp = $_FILES['upload']['tmp_name'];
$errCode = $_FILES['upload']['error'];


if($errCode == 0){
    // 图片通过验证
    // 1.重命名文件
    $rule = date('Ymd_H_i_s');
    $index = strrpos($name, '.');
    $suffix = substr($name, $index);
    $name = substr_replace($name, $rule.$suffix, 0);

    move_uploaded_file($tmp, $dir.$name);

    // 3.wangEditor上传服务端的接口返回数据：$data用于显示图片，其位置必须为虚拟位置，所以这里使用 $url
    $data = Array($url.$name);
    $result = Array(
        'errno'=>0,
        'data'=>$data
    );
    echo json_encode($result, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
}else {
    echo json_encode('服务器好像出了点问题，图片插入失败了。', JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
}