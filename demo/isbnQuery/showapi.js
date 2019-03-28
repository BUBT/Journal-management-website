window.onload = function(){
    let isbn = document.getElementById('isbn');
    let query = document.getElementById('query');

    if(query) {

        // 测试ISBN码：9787115473264

        query.addEventListener('click', function(){
            let url = './showapi.php';
            let param = `isbn=${isbn.value}`;

            createXHR(url, param, function(data) {
                console.log(data)
                let res = document.getElementById('res');
                let content = '';
                console.log(data.author)
                alert(data.author);

                // data.forEach(element => {
                //     console.log(element)
                // });
                console.log(Object.keys(data))
                console.log(Object.values(data))
                // res.innerHTML = data;
            })
        })
    }

}


function createXHR( server_url, send_param, callback ) {
    let xhr;
    if(window.XMLHttpRequest){
      xhr = new XMLHttpRequest();
    }else if(window.ActiveXObject){
      xhr = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xhr.open('POST', server_url, true);
    xhr.onreadystatechange = function(){
      if(xhr.readyState === 4 && xhr.status === 200){
        let data = JSON.parse(xhr.responseText);
        // console.log(data);
        callback( data );
      }
    };
  
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.send(send_param);
  }
  