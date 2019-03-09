<?php

// 实现某接口的类：关键字 implements。连接多个接口时，使用逗号隔开

class ImplementsInterfaceClass
    implements TestInterface
{
    protected $connection;
    public function setConnection(\Connection $connection)
    {
        $this->connection = $connection;
    }
}