<?php

namespace app\test;

class StaticClass
{
    public $public_variable = 'public variable';
    protected $protected_variable = 'protected variable';
    private $private_variable = 'private variable';
    public static $_static_variable = 'static variable';
    

    public function __construct()
    {
        // 构造函数
        echo 'You built a class instance!' . PHP_EOL;
    }

    public function publicFunction()
    {
        // 普通的公有函数
        echo 'You created a normal public function.' . PHP_EOL;
    }

    protected function protectedFunction()
    {
        // 受保护的函数，只允许类自身及其子类使用
        echo 'You have accessed a protected function.' . PHP_EOL;
    }

    private function privateFunction()
    {
        // 私有函数，仅允许类自身使用
        echo 'You have accessed a private function.' . PHP_EOL;
    }

    public static function staticFunction()
    {
        // 静态函数，允许不为类创建实例的情况下使用
        echo 'You have accessed a static function.' . PHP_EOL;
    }

    public function accessStaticVariable()
    {
        // 访问类中的静态变量：使用 self 关键字
        return self::$_static_variable;
    }

    public function lateStaticBinding()
    {
        // 延迟静态绑定：使用 self 关键字时 PHP 会绑定最早的定义；而使用 static 关键字时 PHP 会绑定最迟的定义
        return static::$_static_variable;
    }

    public function accessPrivateVariableInsideClass()
    {
        // 在类的内部访问私有变量
        return $this->private_variable;
    }
}