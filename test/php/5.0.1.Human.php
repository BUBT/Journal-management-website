<?php

// 自动加载无效！文件名必须与类名一致！
namespace Test;

class Human
{
    public $name = 'Lynn';
    public $age = 0;

    public function __construct()
    {
        return $this;
    }

    public function setName( $name )
    {
        $this->name = $name;
    }

    public function say()
    {
        echo 'World Peace';
    }
}