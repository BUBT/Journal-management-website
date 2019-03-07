<?php

// 访问类属性和方法的测试

require_once '../vendor/autoload.php';

use App\Test\StaticClass;

try {
    $instance = new StaticClass();
    // echo $instance->public_variable . PHP_EOL;
    // echo $instance->protected_variable . PHP_EOL;// 失败
    // echo $instance->private_variable . PHP_EOL;// 失败
    // echo $instance::$_static_variable . PHP_EOL;
    // echo StaticClass::$_static_variable . PHP_EOL;
    $instance->publicFunction();
    // $instance->protectedFunction();// 失败
    // $instance->privateFunction();// 失败
    $instance::staticFunction();
    echo $instance->accessPrivateVariableInsideClass();

} catch (\Throwable $th) {
    throw $th;
}