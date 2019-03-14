<?php

// 保存本地数据至远程服务器（并不在本地产生临时数据，而是直接写入远程服务器）
// header('content-type:text/plain;charset=utf8');

$str = $_POST['data'] ?? 'dhskdjskds';
$tmpFile = time() . '.txt';
file_put_contents($tmpFile, $str);

// echo json_encode(realpath($tmpFile), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
$data = makeCurlFile(realpath($tmpFile));

// $data = array('file' => '@' . realpath($tmpFile));
// $data = array('file' => '@' . realpath($tmpFile) . ";type=text/plain;filename=" . $tmpFile);
// $data = array('file' => realpath($tmpFile) . ";type=text/plain;filename=" . $tmpFile);
$remote_url = 'http://localhost/upload.php';

$curl = curl_init();
echo json_encode('1', JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
curl_setopt($curl, CURLOPT_URL, $remote_url);
// curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_SAFE_UPLOAD, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
curl_exec($curl);
curl_close($curl);
unlink($tmpFile); //删除临时文件


// try {
//     $str = 'dshajkdhskadjjksadsla';
//     $tmpFile = time() . '.txt';
//     file_put_contents($tmpFile, $str);

//     // echo json_encode(realpath($tmpFile), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
//     $data = makeCurlFile($tmpFile);

//     // $data = array('file' => '@' . realpath($tmpFile));
//     // $data = array('file' => '@' . realpath($tmpFile) . ";type=text/plain;filename=" . $tmpFile);
//     // $data = array('file' => realpath($tmpFile) . ";type=text/plain;filename=" . $tmpFile);
//     $remote_url = 'http://localhost/upload.php';

//     $curl = curl_init($remote_url);
//     // curl_setopt($curl, CURLOPT_URL, $remote_url);
//     // curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
//     curl_setopt($curl, CURLOPT_POST, true);
//     curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
//     curl_exec($curl);
//     curl_close($curl);
//     unlink($tmpFile); //删除临时文件
// } catch (\Throwable $th) {
//     //throw $th;
//     echo json_encode($th);
// }


function makeCurlFile($fileName) {
    $mime = mime_content_type( $fileName );
    $info = pathinfo($fileName);
    $name = $info['basename'];
    $output = new CURLFile($fileName, $mime, $name);
    return $output;
}
