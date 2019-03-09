<?php

// 接口：通常用于规范化应用程序编程接口(API)，不含有执行实际操作的代码，但是会含有方法的名称和签名

interface TestInterface
{
    public function setConnection( Connection $connection );
}