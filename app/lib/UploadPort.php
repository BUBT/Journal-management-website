<?php

namespace app\lib;


class UploadPort
{
    // const remoteUrl = 'http://localhost:8081/src/upload';
    const feedbackCode = [
        0 => '上传成功',
        1 => '文件过大',
        2 => '未检测到任何文件上传',
        3 => '其他错误'
    ];

    public function __construct()
    {
        // 
    }

    /**
     * UploadPort::upload            服务器上传文件接口
     *
     * @param string $rmeote_url     服务器目录远程地址，如 'http://localhost/src/upload/'
     * @param string $server_dir     文件上传服务器目录，如 '../../src/upload/'
     * @param string $files_symbol   文件上传标识，默认为 remote
     * @return void
     */
    public static function upload(
        $remote_url = 'http://localhost/src/upload/',
        $server_dir = '../../src/upload/',
        $files_symbol = 'remote'
    )
    {
        if( !file_exists($server_dir) ) {
            @mkdir($server_dir);
        }

        if ($_FILES) {
            $format = substr(basename($_FILES[$files_symbol]['name']), strrpos( $_FILES[$files_symbol]['name'], '.' ));
            $file_name  = 'upload_' . time() . '.' . $format;
            $file_tmp_name = $_FILES[$files_symbol]['tmp_name'];
            $upload_to_url = $server_dir . basename($file_name);

            if(move_uploaded_file($file_tmp_name, $upload_to_url)) {
                // 上传成功
                $res = $remote_url . $file_name;
                echo $res;
            } elseif ($_FILES[$files_symbol]['size'] > 1024 * 1024 * 5) {
                echo self::feedbackCode[1];
                // return false;
            } else {
                echo $_FILES[$files_symbol]['tmp_name'];
                // return false;
            }
        } else {
            echo self::feedbackCode[2];
            // return false;
        }
    }
}