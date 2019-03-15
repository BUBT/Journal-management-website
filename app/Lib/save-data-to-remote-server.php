<?php

// 保存本地数据至远程服务器（并不在本地产生临时数据，而是直接写入远程服务器）
// 远程服务器上的 upload.php 文件代码位于：/app/Remote/upload.php

// 1.获取数据并写入文件
$str = $_POST['data'] ?? 'dhskdjskds';
$tmpFile = time() . '.txt';
file_put_contents($tmpFile, $str);

// 2.远程服务器上传文件接口地址
// $remote_url = 'http://localhost/upload.php';
$remote_url = 'http://localhost:8081/app/lib/upload.php';

// 3.创建 CURLFile 对象：被上传文件的绝对地址、被上传文件的 MIME 类型、被上传文件的文件名（在远程服务器上的文件名）
$cFile = new CURLFile(realpath($tmpFile), 'text/plain', 'test.txt');

// 4.被上传文件在 $_FILES 数组中的标识符及 CURLFile 数据
$data = array('file'=>$cFile);

// 5.创建 cURL 句柄，并开始传输数据（从PHP 5.5 开始，cURL只能通过发送 CURLFile 数据）
$curl = curl_init($remote_url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
$res = curl_exec($curl);
curl_close($curl);

// 6.删除保存在本地服务器的临时文件
unlink($tmpFile);

// 
echo json_encode($res, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);