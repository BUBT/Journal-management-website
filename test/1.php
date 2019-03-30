<?php

$isbn = '9787115473264';
$isbn = '9787534155550';
$url = 'http://isbn.szmesoft.com/isbn/query?isbn=' . $isbn;


$curl = curl_init( $url );
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Length: 0'));
$res = curl_exec($curl);
curl_close($curl);

// echo json_encode($res, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
echo $res;
// print_r($res);
// echo json_decode($res, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
// var_dump($res);
// $res = str_replace('{', '[', $res);
// $res = str_replace('}', ']', $res);
// var_dump($res);