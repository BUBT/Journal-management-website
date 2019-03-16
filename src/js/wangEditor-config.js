// 富文本编辑器wangEditor的相关配置

window.onload = function(){
  const sUploadImgHandle = '/app/lib/wangeditor-upload-img.php';
  const sSaveAricleDataHandle = '/app/lib/save-article-data-by-js.php';
  const sDisplayFilesInDirHandle = '/app/lib/show-all-files-in-dir.php';
  const sDeleteFileHandle = '';

  const sEditorIdName = 'editor';
  const sSubmitArticleIdName = 'save_article';
  const sArticlePrefix = 'article_';
  const oArticle = {
    title: sArticlePrefix + 'title',
    author: sArticlePrefix + 'author',
    abstract: sArticlePrefix + 'abstract',
    kw: sArticlePrefix + 'kw'
  };
  // const sArticleTitleIdName = 'article_title';
  // const sArticleAuthorIdName = 'article_author';

  const sListUnprocessedManuscriptIdName = 'unprocessed-manuscript-list';
  const sListDepositsIdName = 'deposit-box-list';


  // 创建编辑器
  let editor = createEditorObject(sEditorIdName, sUploadImgHandle);
  // 提交文章
  let confirm = document.getElementById(sSubmitArticleIdName);
  if( confirm ) {
    confirm.addEventListener( 'click', function(){
      let title = document.getElementById(oArticle.title).value;
      let author = document.getElementById(oArticle.author).value;
      let abstract = document.getElementById(oArticle.abstract).value;
      let kw = document.getElementById(oArticle.kw).value;

      let content = editor.txt.text();
      // console.log(content);
      let html = editor.txt.html();
      // console.log(html);

      let server_url = sSaveAricleDataHandle;
      let send_param = 'title=' + encodeURIComponent( title ) + '&author=' + encodeURIComponent( author ) + '&abstract=' + encodeURIComponent( abstract ) + '&kw=' + encodeURIComponent( kw ) + '&content=' + encodeURIComponent( content ) + '&html=' + encodeURIComponent( html );
      createXHR( server_url, send_param, function(){
        alert('保存成功~');
      } );

    }, false )
  }

  // 显示所有的文件
  createXHR(sDisplayFilesInDirHandle, '', getUnprocessedManuscript);

  // 删除指定文件
  // const 
  // createXHR(sDeleteFileHandle, '', fDelteFile);

  
}


// 4.根据ID名删除元素节点
let deleteLine = function remove_a_line_data_by_click_button(sIdName) {
  const row = document.getElementById(`lines_${sIdName}`);
  row.remove();
}

// 4.根据文件地址，删除该文件
let fDelteFile = function deleteSubmission( data ) {

}

// 3.利用 Ajax 返回的数据生成表格
function getUnprocessedManuscript( data ) {
  let unprocessed_manuscript_list = document.getElementById('unprocessed-manuscript-list');
  let table = '';
  data.forEach((element,index) => {
    table += `<tr id='lines_${index}'><td> </td><td>${element['name']}</td><td><a href='${element['url']}'>下载</a></td><td><button onClick='deleteLine(${index})'>拒绝</button></td></tr>`
  });
  unprocessed_manuscript_list.innerHTML = table;
}

// 2.创建 XMLHttpRequest 对象：createXHR()
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