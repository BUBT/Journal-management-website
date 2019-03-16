<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

use app\data\Connection;

// 使用迭代器：ArrayIterator对象可以将PHP中标准数组转换为迭代器。

// $iterator = new ArrayIterator( $array );

function html_list( $iterator )
{
    $output = '<ul>';
    while( $value = $iterator->current() ) {
        $output .= '<li>' . $value . '</li>';
        $iterator->next();
    }
    $output .= '</ul>';
    return $output;
}

// 使用 CallbackFilterIterator 实例为已经存在的迭代器添加值，能够封装任何已经存在的迭代器并显示它们的输出结果

function fetch_human_name( $sql, $connection )
{
    $iterator = new ArrayIterator();
    // $stmt = $connection->pdo->query( $sql );
    $stmt = $connection->query( $sql );
    while( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ) {
        $iterator->append( $row['label'] );
    }
    return $iterator;
}

$connection = Connection::getInstance('../config/testDB.php');
$sql = 'SELECT * FROM `single_filed_varchar_label`';
var_dump( fetch_human_name( $sql, $connection ) );