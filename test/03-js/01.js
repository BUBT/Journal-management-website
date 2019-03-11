"use strict";

let message = 'Hello!'; // 定义变量，并且赋值

alert(message); // Hello!

// 逗号优先定义变量
let user = 'John'
    , age = 25
    , message = 'Hello';


// 变量命名：区分大小写，非数字开头，可使用特殊符号 $ _
let userName;
let test1234;
let $dollar;
let _private;
// let my-name;  // JavaScript不允许使用连字符

// 声明常量 const：不允许改变，通常使用大写+下划线组成命名
const PI = 3.141592653;