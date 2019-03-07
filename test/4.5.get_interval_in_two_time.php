<?php

// 获取两个时间之间的间隔，时间字符串格式：YYYY-mm-dd HH:mm:ss

function get_interval_in_two_time( $time_now_string, $time_past_string )
{
    $interval = array(
        'year' => 0,
        'month' => 0,
        'day' => 0,
        'hour' => 0,
        'minute' => 0,
        'second' => 0
    );
    $time_now = strtotime( $time_now_string );
    $time_past = strtotime( $time_past_string );
    // 获取年份
    $time_now_year = substr( $time_now_string, 0, 4 );
    $time_past_year = substr( $time_past_string, 0, 4 );
    // 获取月份
    $time_now_month = substr( $time_now_string, 5, 2 );
    $time_past_month = substr( $time_past_string, 5, 2 );
    // 获取天数
    $time_now_day = substr( $time_now_string, 8, 2 );
    $time_past_day = substr( $time_past_string, 8, 2 );
    // 获取小时
    $time_now_hour = substr( $time_now_string, 11, 2 );
    $time_past_hour = substr( $time_past_string, 11, 2 );
    // 获取分钟
    $time_now_minute = substr( $time_now_string, 14, 2 );
    $time_past_minute = substr( $time_past_string, 14, 2 );
    // 获取秒钟
    $time_now_second = substr( $time_now_string, 17, 2 );
    $time_past_second = substr( $time_past_string, 17, 2 );
    

    // $total_interval_seconds = $time_now - $time_past;
    // $total_interval_minutes = $total_interval_seconds / 60;
    // $total_interval_hours = $total_interval_minutes / 60;
    // $total_interval_days = $total_interval_hours / 24;
    // $total_interval_months = $total_interval_days / 30;
    // $total_interval_years = $total_interval_months / 12;

    // if( $total_interval_years > 0 ) {
    //     $interval['year'] = $total_interval_years;
    // } else if ( $total_interval_months > 0 ) {
    //     $interval['month'] = $total_interval_months;
    // } else if ( $total_interval_days > 0 ) {
    //     $interval['day'] = $total_interval_days;
    // } else if ( $total_interval_hours > 0 ) {
    //     $interval['hour'] = $total_interval_hours;
    // } else if ( $total_interval_minutes > 0 ) {
    //     $interval['minute'] = $total_interval_minutes;
    // } else {
    //     $interval['second'] = $total_interval_seconds;
    // }

    return $interval;

}

$time_now_string = '2019-03-07 03:50:50';
$time_past_string = '1987-07-27 10:32:14';
var_dump( get_interval_in_two_time( $time_now_string, $time_past_string ) );