/**
 * Ajax 异步访问服务器
 * @param {String} server_url  服务器地址 
 * @param {String} send_param  POST参数
 * @param {Function} callback  回调函数
 */
let createXHR = function(server_url = '', send_param = '', callback) {
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