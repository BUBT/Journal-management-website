window.onload = function(){
    // if(checkUser()){
    checkUser()
    // };
}



function checkUser()
{
    // let btnSignin = document.getElementById('btn-signin');
        // btnSignin.addEventListener('click', function(){
        //     window.open('./signin.html', '_self');
        // })

    // let signout = document.getElementById('btn-signout');
        // signout.addEventListener('click', function(){
        //     localStorage.removeItem('name');
        // })

    let userExist = document.getElementById('yes-user');
    let noUser = document.getElementById('no-user');

    // let userInfo = document.getElementById('user-info');

    if(localStorage.name) {
        // 用户存在
        // btnSignin.style.display = 'none';
        // userInfo.style.display = 'block';
        noUser.style.display = 'none';
        userExist.style.display = 'block';

        let userName = document.getElementById('user-name');
        userName.innerHTML = `用户名：${localStorage.name}`;

        let signout = document.getElementById('btn-signout');
        signout.addEventListener('click', function(){
            noUser.style.display = 'block';
            userExist.style.display = 'none';
            localStorage.removeItem('name');
        })

        return true;
    } else {
        // 用户未登录
        noUser.style.display = 'block';
        userExist.style.display = 'none';

        let btnSignin = document.getElementById('btn-signin');
        btnSignin.addEventListener('click', function(){
            // window.open('./signin.html', '_self');
            alert(1);
            window.location.replace('./signin.html');
        }, 1)

        return false;
    }
}

// function signin()
// {
//     // window.open('./signin.html', '_self');
    
// }