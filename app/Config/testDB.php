<?php

// journal数据库配置文件
return [
    'type' => 'mysql',
    'host' => 'localhost:8081',
    'port' => 3306,
    'dbname' => 'test',
  
    'dsn' => 'mysql:host=$host;port=$port;dbname=$dbname',
    'username' => 'root',
    'userpwd' => 'mysql',
    'charset' => 'utf8'
    
];