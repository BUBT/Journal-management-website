<?php

namespace app\lib;

use RecursiveIteratorIterator;
use RecursiveDirectoryIterator;
use RegexIterator;

class RemoteFiles
{
    const PATTERN  = [
        'image' => '*.jpg|png|jpeg|gif',
        'html'  => '*.html',
        'doc'   => '*.doc|docx|md'
    ];

    const PATH = [
        'upload' => "/src/upload/",
        'issues' => "/src/issues/"
    ];

    public function __construct()
    {
        // 
    }

    public function downloadFileByLink(
        $path = ''
    )
    {
        header('Content-Description: File Transfer'); //描述页面返回的结果
        header('Content-Type: application/octet-stream'); //返回内容的类型，此处只知道是二进制流。具体返回类型可参考http://tool.oschina.net/commons
        header('Content-Disposition: attachment; filename='.basename($file));//可以让浏览器弹出下载窗口
        header('Content-Transfer-Encoding: binary');//内容编码方式，直接二进制，不要gzip压缩
        header('Expires: 0');//过期时间
        header('Cache-Control: must-revalidate');//缓存策略，强制页面不缓存，作用与no-cache相同，但更严格，强制意味更明显
        header('Pragma: public');
        header('Content-Length: ' . filesize($file));//文件大小，在文件超过2G的时候，filesize()返回的结果可能不正确

        set_time_limit(0);
        $file = @fopen($file_path,"rb");
        while(!feof($file))
        {
            print(@fread($file, 1024*8));
            ob_flush();
            flush();
        }
    }

    /**
     * RemoteFiles->displayFilesListInDir() 显示某个目录下特定类型的文件列表
     *
     * @param string $path      要查找的文件系统目录，如 '/src/upload/'
     * @param string $url       反馈在服务器上的该文件系统目录对应的 URL 地址，如 'http://localhost:8081/src/upload/'
     * @param string $pattern   查询的正则表达式
     * @return void             返回所查找文件列表，数组形式['name'] ['time'] ['url']
     */
    public function displayFilesListInDir(
        $path = '', 
        $url = '', 
        $pattern = ''
    )
    {
        $res = array();
        $rdi = new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator( $path, 1 ),
            RecursiveIteratorIterator::SELF_FIRST
        );
        $outerIterator = ($pattern) ? self::_regex($rdi, $pattern) : $rdi;
        $index = 0;
        foreach ($outerIterator as $name => $obj) {
            if ($obj->isDir()) {
                if ($obj->getFileName() == '..') {
                    continue;
                }
                $res[]['name'] = $obj->getPath() . PHP_EOL;
            } else {
                $res[$index]['name'] = sprintf( '%-40s', $obj->getFileName() );
                $res[$index]['url'] = $url . sprintf( '%-40s', $obj->getFileName() );
                $res[$index]['time'] = date('Y-m-d H:i', $obj->getATime());
            }
            $index++;
        }
        return $res;
    }


    /**
     * RemoteFiles::regex()
     *
     * @param RecursiveIteratorIterator $iterator    迭代器对象
     * @param string $pattern                        正则表达式
     * @return void                                  返回基于正则表达式过滤另一个迭代器的迭代器
     */
    public static function _regex( 
        RecursiveIteratorIterator $iterator, 
        $pattern = ''
    )
    {
        $pattern = '!^.' . str_replace( '.', '\\.', $pattern ) . '$!';
        return new RegexIterator( $iterator, $pattern );
    }


    public static function _getFileFormat($file_name)
    {
        $pos_of_last_decimal_point = strrpos( $file_name, '.' );
        return substr( $file_name, $pos_of_last_decimal_point );
    }
}