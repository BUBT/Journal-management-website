<?php

// 获取字符串中的图片地址列表


function get_img_url_in_string( $string )
{
    $arr = Array();
    preg_match_all( '/<img(.*?)>/', $string, $match );
    $img_labels = $match[0];
    foreach($img_labels as $key => $value){
      preg_match('/<img.+src=\"?(.+\.(jpg|jpeg|gif|bmp|bnp|png))\"?.+>/i', $value, $res);
      @$arr[$key] = $res[1];
    }
    return $arr;
}


$string = <<<STRING
<dl class="Design_appreciation_list">
    <dt><a  href="http://www.logoquan.com/logo/77522.html"><img src="http://www.logoquan.com/upload/list/20180920/logoquan15451727383.PNG" width="180" height="150" alt="LoveHome标志"></a></dt>
    <dd><a  href="http://www.logoquan.com/logo/77522.html">LoveHome标志</a></dd>
  </dl>
	
  <dl class="Design_appreciation_list">
    <dt><a  href="http://www.logoquan.com/logo/77514.html"><img src="http://www.logoquan.com/upload/list/20180920/logoquan15437646348.PNG" width="180" height="150" alt="别墅小区标识"></a></dt>
    <dd><a  href="http://www.logoquan.com/logo/77514.html">别墅小区标识</a></dd>
  </dl>
	
  <dl class="Design_appreciation_list">
    <dt><a  href="http://www.logoquan.com/logo/77513.html"><img src="http://www.logoquan.com/upload/list/20180920/logoquan15418895444.PNG" width="180" height="150" alt="BeeHazard标志"></a></dt>
    <dd><a  href="http://www.logoquan.com/logo/77513.html">BeeHazard标志</a></dd>
  </dl>
	
  <dl class="Design_appreciation_list">
    <dt><a  href="http://www.logoquan.com/logo/77510.html"><img src="http://www.logoquan.com/upload/list/20180920/logoquan15397015138.PNG" width="180" height="150" alt="无人机logo标志"></a></dt>
    <dd><a  href="http://www.logoquan.com/logo/77510.html">无人机logo标志</a></dd>
  </dl>
	
  <dl class="Design_appreciation_list">
    <dt><a  href="http://www.logoquan.com/logo/77509.html"><img src="http://www.logoquan.com/upload/list/20180920/logoquan15464201026.PNG" width="180" height="150" alt="Foxy狐狸图标"></a></dt>
    <dd><a  href="http://www.logoquan.com/logo/77509.html">Foxy狐狸图标</a></dd>
  </dl>
	
  <dl class="Design_appreciation_list">
    <dt><a  href="http://www.logoquan.com/logo/77503.html"><img src="http://www.logoquan.com/upload/list/20180920/logoquan15453254208.PNG" width="180" height="150" alt="MovLoc小视频应用"></a></dt>
    <dd><a  href="http://www.logoquan.com/logo/77503.html">MovLoc小视频应用</a></dd>
  </dl>
	
  <dl class="Design_appreciation_list">
    <dt><a  href="http://www.logoquan.com/logo/77497.html"><img src="http://www.logoquan.com/upload/list/20180920/logoquan15448557386.PNG" width="180" height="150" alt="Bestcoin比特币标志"></a></dt>
    <dd><a  href="http://www.logoquan.com/logo/77497.html">Bestcoin比特币标志</a></dd>
  </dl>
	
  <dl class="Design_appreciation_list">
    <dt><a  href="http://www.logoquan.com/logo/77495.html"><img src="http://www.logoquan.com/upload/list/20180920/logoquan15415743484.PNG" width="180" height="150" alt="Estacoes花店logo"></a></dt>
    <dd><a  href="http://www.logoquan.com/logo/77495.html">Estacoes花店logo</a></dd>
  </dl>
STRING;
var_dump( get_img_url_in_string( $string ) );