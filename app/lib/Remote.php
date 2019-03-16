<?php

namespace app\lib;

use CURLFile;

/**
 * Remote 远程操作类
 */
class Remote
{
    const file_type = array(
        '.html',
        '.txt',
        '.json',
        '.jpeg',
        '.png',
        '.jpg'
    );

    /**
     * 完整的 MIME 列表见下列网址：
     * https://developer.mozilla.org/zh-CN/docs/Web/HTTP/Basics_of_HTTP/MIME_types/Complete_list_of_MIME_types
     */
    const file_mime = array(
        'default' => 'text/plain',
        'html' => 'text/html',
        'jpg' => 'image/jpeg',
        'png' => 'image/png',
        'json' => 'application/json',
    );

    public function __construct()
    {
        // 
    }

    /**
     * Remote::upload_text()      远程上传纯文本文件
     *
     * @param string $text_string 纯文本数据
     * @param string $file_type   文件类型，如 html txt md 等
     * @param string $file_name   上传至远程服务器中的文件名
     * @param string $file_mime   文件 MIME 类型，如 text/plain
     * @param string $remote_upload_port_url 远程服务器上传接口地址
     * @param string $files_symbol 文件上传至 $_FILES[] 数组的标识符
     * @return void
     */
    public static function upload_text( 
        $text_string = '纯文本数据', 
        $file_type = 'html',
        $file_name = '文件名',
        $remote_upload_port_url = 'http://localhost:8081/app/remote/upload.php', 
        $files_symbol = 'remote' )
    {
        // 1.获取数据并写入临时文件
        $tmpFile = time() . '.' . $file_type;
        file_put_contents( $tmpFile, $text_string );

        // 2.创建 CURLFile 对象：被上传文件的绝对地址、被上传文件的 MIME 类型、被上传文件的文件名（在远程服务器上的文件名）
        $cFile = new CURLFile(
            realpath($tmpFile), 
            self::file_mime[$file_type],
            $file_name
        );
        $data = array(
            $files_symbol => $cFile
        );

        // 3.创建 cURL 句柄，并开始传输数据（从PHP 5.5 开始，cURL只能通过发送 CURLFile 数据）
        $curl = curl_init( $remote_upload_port_url );
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        $res = curl_exec($curl);
        curl_close($curl);

        // 4.删除保存在本地服务器的临时文件
        unlink($tmpFile);

        // 5.返回 cURL 的结果
        return $res;
    }
}