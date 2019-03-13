"use strict";

(function () {

    console.log('这是开始');

    setTimeout(function cb() {
        console.log('这是来自第一个回调的消息');
    });

    console.log('这是一条消息');

    setTimeout(function cb1() {
        console.log('这是来自第二个回调的消息');
    }, 0);

    console.log('这是结束');

})();
// "这是开始"
// "这是一条消息"
// "这是结束"
// 此处，函数返回了 undefined 
// "这是来自第一个回调的消息"
// "这是来自第二个回调的消息"



// const s = new Date().getSeconds();
// setTimeout(function() {
//   // 输出 "2"，表示回调函数并没有在 500 毫秒之后立即执行
//   alert("Ran after " + (new Date().getSeconds() - s) + " seconds");
// }, 500);
// while(true) {
//   if(new Date().getSeconds() - s >= 2) {
//     alert("Good, looped for 2 seconds");
//     break;
//   }
// }




// // 回调函数：函数在加载中执行
// function loadScript(src, callback) {
//     let script = document.createElement('script');
//     script.src = src;
//     script.onload = () => callback(script);
//     document.head.append(script);
// }



// // 『立即调用函数表达式』（简称为 IIFE）：使用圆括号告诉给 JavaScript，
// // 这个函数是在另一个表达式的上下文中创建的，因此它是一个表达式。它不需要函数名也可以立即调用。
// (function () {

//     let message = "Hello";

//     alert(message); // Hello

// })();



// {
//     // 用局部变量完成一些不应该被外面访问的工作
//     let message = "Hello";
//     alert(message); // Hello
// }
// alert(message); // 错误：message 未定义



// function makeCounter() {
//     let count = 0;
//     return function () {
//         return count++; // has access to the outer counter
//     };
// }
// let counter = makeCounter();
// // counter() 函数不仅会返回 count 的值，也会增加它。
// // 注意修改是『就地』完成的。准确地说是在找到 count 值的地方完成的修改。
// alert(counter);
// alert(counter()); // 0
// alert(counter()); // 1
// alert(counter()); // 2



// function makeWorker() {
//     let name = "Pete";

//     return function () {
//         alert(name);
//     };
// }
// let name = "John";
// // 创建一个函数
// let work = makeWorker();
// // call it
// work(); // 它显示的是什么呢？"Pete"（创建位置的 name）还是"John"（调用位置的 name）呢？Pete



// 函数访问外部变量；它使用的是最新的值。
// let name = "John";
// function sayHi() {
//   alert("Hi, " + name);
// }
// name = "Pete";
// sayHi(); // 它会显示 "John" 还是 "Pete" 呢？Pete



// let salaries = {
//     John: 100,
//     Ann: 160,
//     Pete: 130
// };
// let sum = 0;
// for (let key in salaries) {
//     sum += salaries[key];
// }
// alert(sum); // 390



// let user = {};
// user.name = "John";
// user.surname = "Smith";
// user.name = "Pete";
// alert(user['name']); // Pete
// delete user.name;
// alert(user['name']); // undefined



// let user = {
//     name: "John",
//     age: 30,
//     isAdmin: true
// };
// for (let key in user) {
//     // keys
//     alert(key);  // name, age, isAdmin
//     // 属性键的值
//     alert(user[key]); // John, 30, true
// }



// //表达式在右侧
// let sum = (a, b) => a + b;
// // 或带{...}的多行语法，需要此处返回：
// let sum = (a, b) => {
//   // ...
//   return a + b;
// }
// //没有参数
// let sayHi = () => alert("Hello");
// //有一个参数
// let double = n => n * 2;



// let age = prompt("What is your age?", 18);
// let welcome;
// if (age < 18) {
//   welcome = function() {
//     alert("Hello!");
//   };
// } else {
//   welcome = function() {
//     alert("Greetings!");
//   };
// }
// welcome(); // ok now



// let from = "Ann";
// function showMessage(from, text) {
//     from = 'Lynn';
//     alert(from + ': ' + text);
// }
// showMessage(from, "Hello"); // Lynn: Hello
// alert(from); // Ann
// test(from); // Lynn
// alert(from); // Ann
// function test(hua) {
//     hua = 'Lynn';
//     alert(hua);
// }



// let counter = 0;
// counter++;
// ++counter;
// // alert( counter ); // 2，以上两行作用相同



// let a = (3, 7);
// alert( a );