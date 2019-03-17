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
    public static function regex( 
        RecursiveIteratorIterator $iterator, 
        $pattern = ''
    )
    {
        $pattern = '!^.' . str_replace( '.', '\\.', $pattern ) . '$!';
        return new RegexIterator( $iterator, $pattern );
    }
}