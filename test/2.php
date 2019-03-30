<?php


// 1.接收数据

$isbn = $_POST['isbn'] ?? '';

if($isbn) {
    // 2. 利用ISBN查询数据库中是否有记录

    $sql = '';
    // ...
    $stmt;
    if($stmt->fetch()) {
        // 2.1 数据库中存在
        $info;

    } else {
        // 2.2.1 沟通api，并返回一段数据
        $info;
        // 2.2.2 把返回数据插入数据库 
    }
    echo json_encode($info);
}