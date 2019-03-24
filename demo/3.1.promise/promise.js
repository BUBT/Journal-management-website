'use strict';

/**
 * Promise 测试
 * 
 * 
 */


// let promise = new Promise(
//     function func(resolve, reject) {
//         console.log('第一件事');

//         // if(success) {
//         //     return resolve;
//         // } else {
//         //     return reject;
//         // }
//         // return resolve;
//         resolve();
//         reject();

//         // return 3;
//     }
// );

function getValue() {
    let promise = new Promise(
        function func(resolve, reject) {
            console.log('第一件事');
            let xhr;
            if (window.XMLHttpRequest) {
                xhr = new XMLHttpRequest();
            } else if (window.ActiveXObject) {
                xhr = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xhr.open('POST', '/dev/_output_tags_array.php', true);
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    let data = JSON.parse(xhr.responseText);
                    resolve(data);
                    reject(data);
                }
            };
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.send();
        }
    );
    return promise;
}

let promise = getValue();

promise.then(
    function func2(data) {
        console.log('成功处理第一件事');
        console.log('第二件事的参数为：');
        console.log(data);
    },
    function func3(err) {
        console.log('处理第一件事时发生错误');
        console.log(err);
    }
);

promise.then(
    function(data){
        console.log('正在处理第三件事');
        console.log(data);
    }
)