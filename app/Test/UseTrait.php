<?php

// 使用特性：关键字 use 

namespace app\test;

use app\data\Connection;

class UseTrait
{
    use TestTrait;
    protected $connection;
    protected $key = 'id';
    protected $value = 'label';
    protected $table = 'single_filed_varchar_label';

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

}