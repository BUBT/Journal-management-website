"use strict";

alert( Infinity );// 无穷大，比任何一个数字都大的特殊值

// 得到NaN：代表计算错误，表示一个不对的或者一个未定义的数学操作所得到的结果
alert( "not a number" / 2 ); 


let str = 'Hello';
let str2 = "Hello";
let str3 = `You say to me ${str}`;// 反引号``允许通过${...}将变量和表达式嵌入到字符串中

let boolean = true;
let name = null;

let x;
alert( x );// 弹出 undefined 。表明变量未被赋值


// typeof 运算符返回参数的类型。当我们想要分别处理不同类型值的时候，或者简单地进行检验，就很有用。
typeof undefined // "undefined"
typeof 0 // "number"
typeof true // "boolean"
typeof "foo" // "string"
typeof Symbol("id") // "symbol"
typeof Math // "object"  (1)
typeof null // "object"  (2)
typeof alert // "function"  (3)