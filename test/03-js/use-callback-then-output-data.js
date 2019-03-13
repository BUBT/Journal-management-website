// 利用回调函数对服务器进行响应，并将反馈的数据显示出来

window.onload = function() {
    let server_url = '/app/Lib/show-all-files-in-dir.php';
    let send_param = '';
    xhr(server_url, send_param, createTable);
}

function xhr(server_url, send_param, callback) {
    let xhr;
    if (window.XMLHttpRequest) {
        xhr = new XMLHttpRequest();
    } else if (window.ActiveXObject) {
        xhr = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xhr.open('POST', server_url, true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.send(send_param);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            let data = JSON.parse(xhr.responseText);
            callback(data);
        }
    };
}

function createTable( data ) {
    let use_callback_then_output_data = document.getElementById('use_callback_then_output_data');
    let content = `<table border=1><tbody>`;
    content += '<tr>';
    // for (const key in data) {
    //     if (data.hasOwnProperty(key)) {
    //         const element = data[key];
    //         content += `<td>${element}</td>`;
    //     }
    // }
    data.forEach(element => {
        content += `<td>${element['name']}</td>`;
    });
    content += '</tr></tbody></table>';
    use_callback_then_output_data.innerHTML += content;
}