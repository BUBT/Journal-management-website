<?php

namespace app\lib;

use RecursiveIteratorIterator;
use RecursiveDirectoryIterator;
use RegexIterator;
use finfo;

class Utils
{
    public function __construct()
    {
        // 
    }


    /**
     * Utils::path_to_url()    路径转URL
     *
     * @param string $path     文件本地全路径
     * @param string $url      远程服务器文件夹地址
     * @return void            返回 URL 全地址
     */
    public static function path_to_url(
      $path = '/src/thumbs/thumb_1553257628.jpeg', 
      $url = 'http://localhost:8081/src/thumbs/thumb_1553257628.jpeg'
      )
    {
      $filename = basename($path);
      return $url . $filename;
    }


    /**
     * Utils::get_thumbnail_img()               获取图片的缩略图
     *
     * @param string $original_img_path         原图地址
     * @param string $thumbnail_img_path        生成的缩略图地址
     * @param integer $thumbnail_img_width      要求的缩略图宽度
     * @param integer $thumbnail_img_height     要求的缩略图高度
     * @return void                             返回缩略图路径
     */
    public static function get_thumbnail_img( 
      $original_img_path = '', 
      $thumbnail_img_path = '', 
      $thumbnail_img_width = 200, 
      $thumbnail_img_height = 200
      )
    {
      $temp = array(
        1=>'gif', 
        2=>'jpeg', 
        3=>'png',
        18=>'webp'
      );
      list( $original_img_width, $original_img_height, $tmp ) = getimagesize( $original_img_path );
      if( !$temp[$tmp] ){
        return false;
      }
      $tmp = $temp[$tmp];
      $infunc = "imagecreatefrom$tmp";
      $outfunc = "image$tmp";
      $original_img = $infunc( $original_img_path );
      if( $original_img_width / $thumbnail_img_width > $original_img_height / $thumbnail_img_height ){
        $thumbnail_img_height = $thumbnail_img_width *( $original_img_height / $original_img_width );
      }else{
        $thumbnail_img_width = $thumbnail_img_height * ( $original_img_width / $original_img_height );
      }
      $thumbnail_img = imagecreatetruecolor( $thumbnail_img_width, $thumbnail_img_height );
      imagecopyresampled( $thumbnail_img, $original_img, 0, 0, 0, 0, $thumbnail_img_width, $thumbnail_img_height, $original_img_width, $original_img_height );
      if( $outfunc( $thumbnail_img, $thumbnail_img_path ) ){
        return $thumbnail_img_path;
      }else{
        return false;
      }
    }


    /**
     * Utils::get_file_format()         获取本地文件后缀
     *
     * @param string $file_name         文件名
     * @return void                     返回文件后缀字符串，例如 .jpg
     */
    public static function get_file_format( $file_name = '' )
    {
        $pos_of_last_decimal_point = strrpos( $file_name, '.' );
        $file_format = substr( $file_name, $pos_of_last_decimal_point );
        return $file_format;
    }

    /**
     * Utils::save_rmeote_img()          保存远程图片至文件夹
     *
     * @param string $url                远程图片地址
     * @param string $save_dir           保存文件夹目录，默认为 /src/upload/
     * @return void                      返回该远程图片所在路径
     */
    public static function save_remote_img( $url = '', $save_dir = '../../src/upload/' )
    {
        $type = self::get_file_mime($url);
        $tmp = $save_dir . 'remote_' . time() . $type;
        file_put_contents($tmp, file_get_contents($url));
        return realpath($tmp);
    }


    /**
     * Utils::get_file_mime()        获取远程/本地图片的文件后缀名
     *
     * @param string $url                  远程/本地图片地址
     * @return void                        返回 . 开头的文件后缀名
     */
    public static function get_file_mime( $url = '' )
    {
        $buffer = file_get_contents($url);
        $finfo = new finfo(FILEINFO_MIME_TYPE);
        $mime = $finfo->buffer($buffer);
        $type = str_replace('/', '.', substr($mime, strrpos($mime, '/')));// 返回：.jpg
        return $type;
    }


    /**
     * Utils::get_img_url_in_string()     在一字符串中查找所有的<img>标签的 href 值
     *
     * @param string $string              被查找的字符串值
     * @return void                       返回一个 URL 数组
     */
    public static function get_img_url_in_string( $string = '' )
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


    /**
     * Utils::show_all_files_in_dir()        输出特定文件夹中所有文件名符合正则表达式的文件列表
     *
     * @param string $path                   文件夹路径
     * @param string $url                    替换为文件夹路径的 URL 地址
     * @param [type] $pattern                正则表达式
     * @return void                          返回文件列表数组
     */
    public static function show_all_files_in_dir( $path = '', $url = '', $pattern = NULL )
    {
        $res = array();
        $rdi = new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator( $path, 1 ),
            RecursiveIteratorIterator::SELF_FIRST
        );
        $outerIterator = ($pattern) ? self::regex($rdi, $pattern) : $rdi;
        $index = 0;
        foreach ($outerIterator as $name => $obj) {
            if ($obj->isDir()) {
                if ($obj->getFileName() == '..') {
                    continue;
                }
                $res[]['name'] = $obj->getPath() . PHP_EOL;
            } else {
                $res[$index]['name'] = sprintf( '%-40s', $obj->getFileName() );
                // $res[$index]['url'] = $name;
                $res[$index]['url'] = $url . sprintf( '%-40s', $obj->getFileName() );
                $res[$index]['time'] = date('Y-m-d H:i', $obj->getATime());
            }
            $index++;
        }
    
        return $res;
    }
    public static function regex( $iterator, $pattern )
    {
        $pattern = '!^.' . str_replace( '.', '\\.', $pattern ) . '$!';
        return new RegexIterator( $iterator, $pattern );
    }

}