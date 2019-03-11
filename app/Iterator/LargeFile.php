<?php

namespace App\Iterator;

use Exception;
use InvalidArgumentException;
use SplFileObject;
use NoRewindIterator;

class LargeFile
{
    const ERR_UNABLE = 'ERROR: Uable to open file';
    const ERR_TYPE = 'ERROR: Type must be "ByLength", "ByLine" or "Csv"';
    protected $file;
    protected $allowedTypes = [
        'ByLine',
        'ByLength',
        'Csv'
    ];

    public function __construct( $file_name, $mode = 'r' )
    {
        if( !file_exists( $file_name ) ) {
            $message = __METHOD__ . ' : ' . self::ERR_UNABLE . PHP_EOL;
            $message .= strip_tags( $file_name ) . PHP_EOL;
            throw new Exception( $message );
        }
        $this->file = new SplFileObject( $file_name, $mode );
    }

    // 每次从要处理的文件中读取一行内容，获取文件的行数，适合处理含有换行符的文本文件
    protected function fileIteratorByLine()
    {
        $count = 0;
        while( !$this->file->eof() ) {
            yield $this->file->fgets();
            $count++;
        }
        return $count;
    }

    // 每次从要处理的文件中读取 1024 字节的内容，适合处理较大的二进制文件
    protected function fileIteratorByLength( $numBytes = 1024 )
    {
        $count = 0;
        while( !$this->file->eof() ) {
            yield $this->file->fread( $numBytes );
            $count++;
        }
        return $count;
    }

    public function getIterator( $type = 'ByLine', $numBytes = NULL )
    {
        if( !in_array( $type, $this->allowedTypes ) ) {
            $message = __METHOD__ . ' : ' . self::ERR_TYPE . PHP_EOL;
            throw new InvalidArgumentException( $message );
        }
        $iterator = 'fileIterator' . $type;
        return new NoRewindIterator( $this->$iterator( $numBytes ) );
    }


}