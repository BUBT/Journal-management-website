<?php

// 数据库连接-单例模式

namespace app\data;

use PDO;
use PDOException;

class Connection
{
    const ERROR_UNABLE = '<br>ERROR: 数据库连接失败！<br>';
    private static $instance = NULL;
    private $conn;
    // const DEFAULT_CONFIG = '../config/testDB.php';
    const DEFAULT_CONFIG = '../../app/config/testDB.php';

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

    /**
     * __clone()      防止克隆实例
     *
     * @return void
     */
    private function __clone()
    {
      return $this;
    }

    /**
     * Connection::getInstance()     获取连接数据库实例
     * 
     * @param String $config         数据库连接配置文件地址，默认为 '../../app/config/testDB.php'
     * @return void
     */
    public static function getInstance($config = self::DEFAULT_CONFIG)
    {
        if( !self::$instance )
        {
            self::$instance = new self($config);
        }
        return self::$instance;
    }

    /**
     * Connection->query()        封装查询的一些方法：query exec prepare
     *
     * @param string $sql         查询语句
     * @return void
     */
    public function query( $sql = '' )
    {
        if( $sql && $sql !== '' ) {
            $stmt = $this->conn->query($sql);
            return $stmt;
        }
        return NULL;
    }
}