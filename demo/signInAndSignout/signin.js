window.onload = function() {
    let btnSign = document.getElementById('signin');

    if(btnSign) {
        btnSign.addEventListener('click', function(){
            let userName = document.getElementById('user-name').value;
            let userPwd = document.getElementById('user-pwd').value;
        
            if(userName === 'user' && userPwd == 'user') {
                // saveDataToStorage('name', userName);
                // saveDataToStorage('pwd', userPwd);
                localStorage.name = userName;
                window.open('./index.html', '_self');
            } else {
                alert('密码错误！');
            }
        })
    }
    
}



// 保存数据至 localstorage
function saveDataToStorage( key, value )
{
    localStorage.setItem(key, value);
    localStorage.key = value;


    // localStorage.setItem("key","value");                   // 存储变量名为key，值为value的变量
    // localStorage.key = "value"                             // 同setItem方法，存储数据
    // let valueLocal = localStorage.getItem("key");          // 读取存储变量名为key的值
    // let valueLocal = localStorage.key;                     // 同getItem，读取数据
    // localStorage.removeItem('key');                        // removeItem方法，删除变量名为key的存储变量
    // localStorage.clear();                                  // clear方法，清除所有保存的数据
}

// 1.检查浏览器是否支持 web.localstorage()
function checkStorageSupport()
{
    if (window.localStorage) {
        return true;
    } else {
        return false;
    }
}