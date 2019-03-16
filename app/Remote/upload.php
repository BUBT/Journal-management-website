<?php

// echo json_encode($_FILES, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
// echo json_encode('你撩到了远程服务器~', JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
// echo 'curl成功';

$files_identifier = 'remote';
$upload_dir = $_SERVER['DOCUMENT_ROOT'] . '/src/upload/';
$remote_url = 'http://localhost:8081/src/upload/';

if (!file_exists($upload_dir)) {
    @mkdir($upload_dir);
}

if ($_FILES) {
    $file_name = $_FILES[$files_identifier]['name']; # 客户端机器文件的原名称
    // $file_type = $_FILES[$files_identifier]['type']; # 文件的MIME类型，如果浏览器提供此信息的话
    // $file_size = $_FILES[$files_identifier]['size']; # 已上传文件的大小，单位为字节
    $file_tmp_name = $_FILES[$files_identifier]['tmp_name']; # 文件被上传后在服务器端存储的临时文件名
    // $err_code = $_FILES[$files_identifier]['error']; # 和该文件上传相关的错误代码

    // $upload_dir = 'https://www.lynnzh.top/upload/';
    // $upload_dir = 'http://localhost/src/upload/';

    $upload_file_name = $upload_dir . basename($file_name);
    if (move_uploaded_file($file_tmp_name, $upload_file_name)) {
        // echo json_encode('上传成功！', JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        // echo '上传成功';
        // echo $upload_file_name;
        echo $remote_url . basename($file_name);
    } else {
        // echo json_encode('上传失败!');
        $data  =  json_encode($_FILES, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        // echo $data;
        var_dump($_FILES);
    }

} else {
    // echo json_encode('文件不存在', JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    echo '文件不存在';
}