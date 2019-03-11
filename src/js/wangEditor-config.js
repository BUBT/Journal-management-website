// 富文本编辑器wangEditor的相关配置

window.onload = function(){

  let editor = createEditorObject('editor', '/app/Lib/wangeditor-upload-img.php');
  let confirm = document.getElementById('save_article');
  if( confirm ) {
    confirm.addEventListener( 'click', function(){
      let title = document.getElementById('article_title').value;
      // console.log(title.value);
      let author = document.getElementById('article_author').value;
      let abstract = document.getElementById('article_abstract').value;
      let kw = document.getElementById('article_kw').value;

      let content = editor.txt.text();
      // console.log(content);
      let html = editor.txt.html();
      // console.log(html);

      let server_url = '/app/Lib/save-article-data-by-js.php';
      let send_param = 'title=' + encodeURIComponent( title ) + '&author=' + encodeURIComponent( author ) + '&abstract=' + encodeURIComponent( abstract ) + '&kw=' + encodeURIComponent( kw ) + '&content=' + encodeURIComponent( content ) + '&html=' + encodeURIComponent( html );
      createXHR( server_url, send_param );

    }, false )
  }

  let unprocessed_manuscript = document.getElementById('unprocessed-manuscript');
  if( unprocessed_manuscript ) {
    getUnprocessedManuscript( unprocessed_manuscript );
  }
  
}

function getUnprocessedManuscript( id_obj ) {
  let table = '';
  let server_url = '../../app/Lib/show-all-files-in-dir.php';
  let send_param = '';
  let data = createXHR( server_url, send_param );
  console.log(data);

  if( id_obj ) {
    id_obj.innerHTML = table;
  }
}

// 2.创建 XMLHttpRequest 对象：createXHR()
function createXHR( server_url, send_param ) {
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
      console.log(data);
      // return data;
    }
  };

  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  xhr.send(send_param);
}

// 1.创建编辑器对象：createEditorObject()
function createEditorObject( editor_id, upload_img_server_url ) {
  let E = window.wangEditor;
  let editor = new E( document.getElementById( editor_id ) );
  editor.customConfig.pasteFilterStyle = true;
  editor.customConfig.pasteIgnoreImg = true;
  editor.customConfig.menus = [
    'head',  // 标题
    'bold',  // 粗体
    'fontSize',  // 字号
    'fontName',  // 字体
    'italic',  // 斜体
    'underline',  // 下划线
    // 'strikeThrough',  // 删除线
    'foreColor',  // 文字颜色
    'backColor',  // 背景颜色
    'link',  // 插入链接
    'list',  // 列表
    'justify',  // 对齐方式
    'quote',  // 引用
    'emoticon',  // 表情
    'image',  // 插入图片
    'table',  // 表格
    // 'video',  // 插入视频
    'code',  // 插入代码
    'undo',  // 撤销
    'redo'  // 重复
  ]
  editor.customConfig.uploadImgServer = upload_img_server_url;
  editor.customConfig.uploadFileName = 'upload';
  editor.customConfig.uploadImgMaxSize = 5 * 1024 * 1024;
  editor.customConfig.uploadImgHeaders = {
    'Accept': 'text/x-json'
  };
  editor.customConfig.debug = true;
  editor.customConfig.uploadImgHooks = {};
  editor.create();
  return editor;
}