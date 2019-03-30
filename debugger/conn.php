<?php

// 测试：连接数据库

header("Content-Type:text/html;charset=UTF-8");
echo '<title>测试数据库连接</title>';
$type = 'mysql';
$host = 'localhost';
// $host = '134.175.123.134';
$port = 3306;
$name = 'mysql';
$dsn = "$type:host=$host:3306;dbname=$name";
$user = 'root';
$pwd = 'mysql';

try {
  $db = new PDO($dsn, $user, $pwd,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));# 默认此时数据库为短连接
  # 进行长连接
  // $db = new PDO($dsn, $user, $pwd, array(PDO::ATTR_PERSISTENT => true));
  echo PHP_EOL.'连接成功！'.PHP_EOL;

  $db = null;
  // return $user;
} catch (PDOException $e) {
  $db = null;
  die ("查询失败！<br>Error!: " . $e->getMessage() . "<br/>错误行号：".$e->getLine());
}
