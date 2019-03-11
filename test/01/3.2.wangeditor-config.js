// 富文本编辑器wangEditor的相关配置

window.onload = function(){
    var E = window.wangEditor
    var editor = new E('#editor')
    // 或者 var editor = new E( document.getElementById('editor) )

    editor.customConfig.uploadImgServer = '../test/3.3.wangeditor-upload-img.php'  // 上传图片到服务器
    editor.customConfig.uploadFileName = 'upload';
    editor.customConfig.uploadImgMaxSize = 5 * 1024 * 1024;
    editor.customConfig.uploadImgHeaders = {
      'Accept': 'text/x-json'
    };
    editor.customConfig.debug = true;

    editor.create()
}