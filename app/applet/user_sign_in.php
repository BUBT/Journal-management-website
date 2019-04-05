<?php

/**
 * 微信小程序端
 * 
 * 用户注册
 * 路径：app/applet/usere_sign_in.php
 * 方法：userSignIn()
 * 
 * 返回：uid 用户 ID
 */


require_once dirname(dirname(__DIR__)) . '/vendor/autoload.php';

use app\data\Connection;
use app\data\Applet;

$code = $_GET['code'] ?? '06187CA91vOT5P15vfz91osdA9187CAb';
$name = $_GET['name'] ?? '叽嘻嘻嘻';
$avatar = $_GET['avatar'] ?? 'https://wx.qlogo.cn/mmopen/vi_32/Q0j4TwGTfTKTJEia7U5mWw2D6lplH3FKzbG2jGmN7QC69yQwwOGpzZQ08u32gxqR6JvstepYShxhwKUCLQEGUmA/132';


// echo $code;

if( !empty($code) && !empty($name) && !empty($avatar) ) {
    // 1.根据临时吗 code 获得 openID
    $openID = Applet::code2openid( $code );
    // 2.利用唯一性标识 openID 查询用户是否存在
    $sql_query_is_exist_by_openid = "SELECT `uid` FROM `user` WHERE `openid` = '" . $openID . "'";
    $conn = Connection::getInstance(dirname(__DIR__) . '/config/journalDB.php');

    $stmt = $conn->query( $sql_query_is_exist_by_openid );
    $arr = $stmt->fetch(PDO::FETCH_ASSOC);
    if( $arr ) {
        // 3.1 用户存在，更新其信息并返回用户 ID
        $uid = $arr['uid'];
        $sql_update_user_info = "UPDATE `user` SET `name` = '" . $name . "',`avatar`='" . $avatar . "' WHERE `openid` = '" . $openID . "'";
        $conn->query( $sql_update_user_info );
        echo json_encode($uid, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    } else {
        // 3.2 用户不存在，新添一条记录并返回用户 ID
        $sql_add_a_user_record = "INSERT INTO `user`(`openid`,`name`,`avatar`) VALUES('" . $openID . "','" . $name . "','" . $avatar . "')";
        $conn->query( $sql_add_a_user_record );
        $stmt = $conn->query( $sql_query_is_exist_by_openid );
        $arr = $stmt->fetch(PDO::FETCH_ASSOC);
        $uid = $arr['uid'];
        echo json_encode($uid, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }
} else {
    $tips = '未收到数据！';
    echo json_encode($tips, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    // echo $tips;
}