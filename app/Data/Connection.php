<?php

// 数据库连接-单例模式

namespace App\Data;

use PDO;
use PDOException;

class Connection
{
    const ERROR_UNABLE = '<br>ERROR: 数据库连接失败！<br>';
    private static $instance = NULL;
    private $conn;

    private function __construct($config)
    {
        $config = require_once($config);
        $opt = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];

        try {
            $this->conn = new PDO(
                $config['dsn'],
                $config['username'],
                $config['userpwd'],
                $opt
            );
            $this->conn->query('SET NAMES '.$config['charset']);
            // echo 'connection succeeded!';
        }catch(PDOException $e){
            echo self::ERROR_UNABLE;
            error_log($e->getMessage());
            return FALSE;
        }
        return $this;
    }
    private function __clone()
    {
      return $this;
    }
    public static function getInstance($config = '../Config/testDB.php')
    {
        if( !self::$instance )
        {
            self::$instance = new self($config);
        }
        return self::$instance;
    }

    // 封装查询的一些方法：query exec prepare
    public function query( $sql )
    {
        if( $sql && $sql !== '' ) {
            $stmt = $this->conn->query( $sql );
            return $stmt;
        }
        return NULL;
    }
}