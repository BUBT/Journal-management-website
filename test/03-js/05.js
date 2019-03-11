"use strict";

for (let i = 0; i < 10; i++) {

    //如果为真，跳过循环体的剩余部分。
    if (i % 2 == 0) continue;

    alert(i); // 1、3、5、7、9
}


// 标签 label 是在循环之前带有冒号的标识符
outer: for (let i = 0; i < 3; i++) {

    for (let j = 0; j < 3; j++) {
        let input = prompt(`Value at coords (${i},${j})`, '');
        // 如果是空字符串或已取消，则中断这两个循环。
        if (!input) break outer; // (*)
        // 做些有价值的事
    }
}
alert('Done!');