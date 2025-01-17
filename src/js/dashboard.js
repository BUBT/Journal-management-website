// 后台界面管理

window.onload = function(){
  const sUploadImgHandle = '/Journal-management-website/app/instance/wangeditor-upload-img.php';
  const sSaveAricleDataHandle = '/Journal-management-website/dev/_insert_article_data.php';
  const sDisplayFilesInDirHandle = '/Journal-management-website/dev/_output_specified_type_files.php';
  const sDisplayDepositListHandle = '/Journal-management-website/dev/_output_tags_and_no_issues.php';

  const sEditorIdName = 'editor';
  const sSubmitArticleIdName = 'save_article';
  const sArticlePrefix = 'article_';
  const oArticle = {
    title: sArticlePrefix + 'title',
    author: sArticlePrefix + 'author',
    abstract: sArticlePrefix + 'abstract',
    kw: sArticlePrefix + 'kw'
  };

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

  // 显示存稿箱中的文件
  createXHR(sDisplayDepositListHandle, '', showDepositFiles);

  // 提交存稿箱的更改
  let release = document.getElementById('release')
  if(release) {
    release.addEventListener('click', function(){
      let res = checked()
      // let arr = res['tags'].map(Object.values)
      console.log(res);
      let params = `aids=${res['issues'].join(',')}&tids=${res['tags'].join(',')}`
      createXHR('/Journal-management-website/dev/_update_issues_status_and_tag.php', params, function(data) {
        console.log(data)
        if(data == true) {
          alert('正式发布成功~')
          // 移除选中的项
          res['index'].forEach(element => {
            let row = document.getElementById(`row_${element}`)
            row.remove()
          });
        } else {
          alert(data)
        }
        
      })
      // console.log(res)
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


// 6.下载文件
let downloadFile = function download_file(path) {
  // 暂不使用
}

// 5.显示存稿箱中的文件列表 和 栏目列表
let showDepositFiles = function show_deposit_list( data ) {
  let deposit_list = document.getElementById('deposit-box-list');
  let table = '';
  let select = '';

  if(data['issues']) {
    data['tags'].forEach(ele => {
      select += `<option value='${ele['tid']}'>${ele['tag']}</option>`;
    })
  
    data['issues'].forEach((element, index) => {
    table += `<tr id='row_${index}'>
      <td>${index + 1}</td>
      <td>${element['title']}</td>
      <td>${element['time']}</td>
      <td>
        <select id='tags_${index}' name='tags'>
          ${select}
        </select>
      </td>
      <td><input type='checkbox' name='issues' value='${element['aid']}'></td>
    </tr>`;
    });
  }

  deposit_list.innerHTML = table;
}


// 4.根据ID名删除元素节点
let deleteLine = function remove_a_line_data_by_click_button(sIdName, url) {
  const row = document.getElementById(`lines_${sIdName}`);
  row.remove();
  createXHR('/Journal-management-website/dev/_delete_file_by_path.php', 'delete=' + url, function(){});
}

// TODO:4.根据文件地址，删除该文件
let fDelteFile = function deleteSubmission( data ) {
  // 待办
}

// 3.利用 Ajax 返回的数据生成表格
function getUnprocessedManuscript( data ) {
  let unprocessed_manuscript_list = document.getElementById('unprocessed-manuscript-list');
  let table = '';
  data.forEach((element,index) => {
    table += `<tr id='lines_${index}'>
      <td>${index + 1}</td>
      <td>${element['name']}</td>
      <td><a href='${element['url']}' download="${element['name']}">下载</a></td>
      <td><button onClick="deleteLine(${index}, '${element['url']}')">拒绝</button></td>
    </tr>`
  });
  unprocessed_manuscript_list.innerHTML = table;
}

// 2.创建 XMLHttpRequest 对象：createXHR()
// function createXHR( server_url, send_param, callback ) {
//   let xhr;
//   if(window.XMLHttpRequest){
//     xhr = new XMLHttpRequest();
//   }else if(window.ActiveXObject){
//     xhr = new ActiveXObject("Microsoft.XMLHTTP");
//   }
//   xhr.open('POST', server_url, true);
//   xhr.onreadystatechange = function(){
//     if(xhr.readyState === 4 && xhr.status === 200){
//       let data = JSON.parse(xhr.responseText);
//       // console.log(data);
//       callback( data );
//     }
//   };

//   xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
//   xhr.send(send_param);
// }

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
    // 'fontName',  // 字体
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
    // 'undo',  // 撤销
    // 'redo'  // 重复
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