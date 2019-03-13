<?php

$files_identifier = 'temp';
$file_name = $_FILES[$files_identifier]['name'];# 客户端机器文件的原名称
$file_type = $_FILES[$files_identifier]['type'];# 文件的MIME类型，如果浏览器提供此信息的话
$file_size = $_FILES[$files_identifier]['size'];# 已上传文件的大小，单位为字节
$file_tmp_name = $_FILES[$files_identifier]['tmp_name'];# 文件被上传后在服务器端存储的临时文件名
$err_code = $_FILES[$files_identifier]['error'];# 和该文件上传相关的错误代码

$upload_dir = 'https://www.lynnzh.top/upload/';
$upload_file_name = $upload_dir . basename($file_name);
if($err_code == 0) {
    move_uploaded_file($file_tmp_name, $upload_file_name);
}
// print_r($_FILES);