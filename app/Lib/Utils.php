<?php

namespace App\Lib;

use RecursiveIteratorIterator;
use RecursiveDirectoryIterator;
use RegexIterator;

class Utils
{
    public function __construct()
    {
        // 
    }

    public static function show_all_files_in_dir( $path, $pattern = NULL )
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
                $res[$index]['url'] = $name;
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

    

    public static function save_data_to_file( $data, $file_type, $file_dir, $file_name )
    {
        $url = $file_dir . $file_name . '.' . $file_type;
        file_put_contents( $url, $data );
        return $url;
    }

    public static function get_thumbnail_img( $original_img_path, $thumbnail_img_path, $thumbnail_img_width, $thumbnail_img_height )
    {
      $temp = array(
        1=>'gif', 
        2=>'jpeg', 
        3=>'png'
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
        return true;
      }else{
        return false;
      }
    }

    public static function get_file_format( $file_name )
    {
        $pos_of_last_decimal_point = strrpos( $file_name, '.' );
        $file_format = substr( $file_name, $pos_of_last_decimal_point );
        return $file_format;
    }

    public static function get_remote_img_and_save( $url_string, $remote_img_dir )
    {
        $fn = $remote_img_dir . 'remote_img_' . time() . '.jpg';
        file_put_contents( $fn, file_get_contents( $url_string ));
        return $fn;
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