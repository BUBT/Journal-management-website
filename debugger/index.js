'use strict';

window.onload = function() {
    let server = './index.php'
    let send_param = ''
    createXHR(server, send_param, callback)

    let submit = document.getElementById('submit')
    if(submit) {
        submit.addEventListener('click', function(){
            let res =  checked()
            console.log(res)
        })
    }
}

// 获取特定 select 选择器的值
let selected = function(index) {
    let selectObj = document.getElementById(`tags_${index}`)
    let value = selectObj.options[selectObj.selectedIndex].value
    return value
}

// 获取所有选中的checkbox的值和索引
let checked = function() {
    let checkArr = {
        'issues' : [],
        'index' : [],
        'tags' : []
    }
    let checks = document.getElementsByName('issues')
    for (let index = 0; index < checks.length; index++) {
        const element = checks[index];
        if(element.checked) {
            checkArr['issues'].push(element.value)
            checkArr['index'].push(index)
            checkArr['tags'].push(selected(index))
        }
    }
    return checkArr
}

let callback = function(data) {
    let debug = document.getElementById('debug')

    let select = ''
    data['tags'].forEach(ele => {
        select += `<option value='${ele['tid']}'>${ele['tag']}</option>`;
    })

    let content = ''
    data['issues'].forEach((element, index) => {
        content += `
            <tr>
                <td>${index}</td>
                <td>${element.title}</td>
                <td><select id='tags_${index}'>${select}</select></td>
                <td><input type='checkbox' name='issues' value='${element.aid}'></td>
            </tr>
        `
    })
    debug.innerHTML = content
}




// 创建 XMLHttpRequest 对象：createXHR()
function createXHR(server_url, send_param, callback) {
    let xhr;
    if (window.XMLHttpRequest) {
        xhr = new XMLHttpRequest();
    } else if (window.ActiveXObject) {
        xhr = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xhr.open('POST', server_url, true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            let data = JSON.parse(xhr.responseText);
            // console.log(data);
            callback(data);
        }
    };

    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.send(send_param);
}