<?php

function filtered_results_generator( array $array, $filter, $limit = 10, $page = 0 )
{
    $max = count( $array );
    $offset = $page * $limit;
    foreach ($array as $key => $value) {
        if( !stripos($value, $filter ) !== FALSE )
            continue;
        if( --$offset >= 0 )
            continue;
        if( --$limit <= 0 )
            break;
        yield $value;
    }
}


$url = trim( strip_tags( $_GET['url'] ?? '') );
$filter = trim( strip_tags( $_GET['filter'] ?? '' ) );
$limit = (int) ($_GET['limit'] ?? 10);
$page = (int) ($_GET['page'] ?? 0);
$next = $page + 1;
$prev = $page - 1;
$base = '?url=' . htmlspecialchars( $url ) 
    . '&filter=' . htmlspecialchars( $filter )
    . '&limit=' . $limit
    . '$page=';