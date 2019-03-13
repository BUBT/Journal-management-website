// 回调函数



let arg = Number(prompt('请输入一个数字：', 'example'));
doSomething( arg, callback3 );
// doSomething( arg, callback2 );

function doSomething( arg, callbackFunc ) {
    
    // alert('第一个要执行的函数'); // 第一个要执行的函数
    // setTimeout(
    //     function(){
    //         alert('第一个要执行的函数');
    //     }, 5000);
    // setTimeout(callbackFunc, 1000);
    // let num = Number( arg ) + 1;
    // alert(num);
    // let res = callbackFunc( num ); // 等第一个执行的函数
    // alert(res[0]);
    // callbackFunc();
    let num = callbackFunc(arg);
    alert(num + 2);
}

function callback1() {
    alert('第二个要执行的函数');
}

function callback2( str ) {
    // alert( str );
    return ['hello', 'world', str];
}

function callback3( num ) {
    setTimeout(function(){
        alert( num + 1 );
    }, 3000);
    return num + 1;
}