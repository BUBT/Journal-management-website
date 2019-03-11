"use strict";

let user = {
    name: "John",
    age: 30,
    isAdmin: true
};

for (let key in user) {
    // keys
    alert(key);  // name, age, isAdmin
    // 属性键的值
    alert(user[key]); // John, 30, true
}

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