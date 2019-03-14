window.onload = function () {
    const btn = document.getElementById('save');
    if (btn) {
        btn.addEventListener('click', function () {
            const url = '/app/Lib/save-data-to-remote-server.php';
            const send_param = 'data=dsdhsdjskds';
            createXHR(url, send_param, showData);
        });
    }
}

function showData(data) {
    alert(data);
}

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
            // return data;
            callback(data);
        }
    };

    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.send(send_param);
}
