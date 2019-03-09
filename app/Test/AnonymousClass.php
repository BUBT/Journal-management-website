<?php

// 匿名类：表达式的组成部分，没有名称的类。可以在需要快速创建对象（用过即丢弃）的情况下使用匿名类。
// 匿名类可以扩展自任何类
// 匿名类可以实现接口
// 匿名类可以使用特性


$std = new class ( 123.45, 'TEST' ) {
    public $total = 0;
    public $test = '';
    public function __construct($total, $test)
    {
        $this->total = $total;
        $this->test = $test;
    }
};

