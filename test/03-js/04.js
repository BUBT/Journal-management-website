"use strict";

// 一元运算符(+)：对数字无效
let x = 1;
alert( +x ); // 1
let y = -2;
alert( +y ); // -2
// 转化非数字
alert( +true ); // 1
alert( +"" );   // 0


// 一元运算符优先级高于二元运算符：在二元运算符加号起作用之前，所有的值都转为数字
let apples = "2";
let oranges = "3";
alert( +apples + +oranges ); // 5


// 幂运算符(**)
alert( 2 ** 2 ); // 4  (2 * 2)
alert( 2 ** 3 ); // 8  (2 * 2 * 2)
alert( 2 ** 4 ); // 16 (2 * 2 * 2 * 2)
alert( 4 ** (1/2) ); // 2 (1 / 2 幂相当于开平方，这是数学常识)
alert( 8 ** (1/3) ); // 2 (1 / 3 幂相当于开三次方)


// 前置自相加
let counter = 0;
alert( ++counter ); // 1
let counter = 0;
alert( counter++ ); // 1
