<?php

// 保存本地数据至远程服务器（并不在本地产生临时数据，而是直接写入远程服务器）

$str = <<<STRING
<!-- 垂直导航栏-开始 -->
            <div class="col-2 nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab"
                    aria-controls="v-pills-home" aria-selected="false">数据一览</a>
                <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab"
                    aria-controls="v-pills-profile" aria-selected="false">作品长廊</a>
                <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab"
                    aria-controls="v-pills-messages" aria-selected="false">稿件管理</a>
                <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab"
                    aria-controls="v-pills-settings" aria-selected="true">文章录入</a>
                    <!-- 垂直导航栏-结束 -->
            </div>
STRING;
$tmp_data_key = 'data';// 上传到数组 $_FILES 中的 KEY
$file_name = 'test.html';// 文件名
$file_type = 'text/plain';// 文件类型
// $key = "$tmp_data_key\";filename=\"$file_name\r\nContent-Type: $file_type\r\n";
// $fileds[$key] = $data;
$data = array(
    'file'=>'@' . realpath($file_name) . ";type=text/plain;filename=" . $file_name
);
$url = 'https://www.lynnzh.top/upload';

$ch =curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$content = curl_exec($ch);
echo $content;
// unlink($file_name);