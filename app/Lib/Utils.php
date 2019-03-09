<?php

namespace App\Lib;

class Utils
{
    public function __construct()
    {
        // 
    }

    public static function get_img_url_in_string( $string )
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
}