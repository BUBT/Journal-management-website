<?php

// 获取文件格式名：截取文件名最后一位小数点后的字符串(包括小数点)

$file_name = '4.1.get_file_format.php';
echo get_file_format( $file_name );

function get_file_format( $file_name )
{
    $pos_of_last_decimal_point = strrpos( $file_name, '.' );
    $file_format = substr( $file_name, $pos_of_last_decimal_point );
    return $file_format;
}