"use strict";


/* 

在 JavaScript 中，类型转换的一些规则：
    1. 加号`+`连接字符串：若其中一方或双方都是字符串时，另一个也会被转换为字符串，然后合并字符串；其他情况下则会被转换为数字
    2. NaN(或者 undefined ) 与非字符串相加，结果都是 NaN
    3. 减号`-`运算符，按照数学运算法则进行计算，如果计算错误或者是一个未定义的数学操作，结果为 NaN

*/

alert( Boolean(1) ); // true
alert( Boolean(0) ); // false

alert( Boolean("hello") ); // true
alert( Boolean("") ); // false

alert( Boolean("0") ); // true
alert( Boolean(" ") ); // 空白, 也是 true (任何非空字符串是 true)


// "" + 1 + 0
// "10"

// "" - 1 + 0
// -1

// true + false
// 1

// 6 / "3"
// 2

// 4 + 5 + "px"
// "9px"

// "$" + 4 + 5
// "$45"

// "4px" - 2
// NaN

// 7 / 0
// Infinity

// "  -9\n" + 5
// "  -9
// 5"

// "  -9\n" - 5
// -14

// null + 1
// 1

// undefined + 1
// NaN