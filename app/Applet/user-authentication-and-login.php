<?php

// 用户验证与登录：接收 3 个参数：code name avatar
// user-authentication-and-login.php

require_once '/vendor/autoload.php';

use app\data\Connection;
use app\applet\Base;

$code = $_GET['code'] ?? '';
$name = $_GET['name'] ?? '';
$avatar = $_GET['avatar'] ?? '';

if( !empty($code) && !empty($name) && !empty($avatar) ) {
    // 1.根据临时吗 code 获得 openID
    $openID = Base::code2openid( $code );
    // 2.利用唯一性标识 openID 查询用户是否存在
    $sql_query_is_exist_by_openid = 'SELECT `id` FROM `user` WHERE `user_openID` = ' . $openID;
    $conn = Connection::getInstance('/app/config/magazineDB.php');
    $stmt = $conn->query( $sql_query_is_exist_by_openid );
    if( $stmt ) {
        // 3.1 用户存在，更新其信息并返回用户 ID
        $arr = $stmt->fetch(PDO::FETCH_ASSOC);
        $uid = $arr['id'];
        $sql_update_user_info = "UPDATE `user` SET `user_name` = '" . $name . "',`user_avatar`='" . $avatar . "' WHERE `user_openID` = '" . $openID . "'";
        $conn->query( $sql_update_user_info );
        echo $uid;
    } else {
        // 3.2 用户不存在，新添一条记录并返回用户 ID
        $sql_add_a_user_record = "INSERT INTO `user`(`user_openID`,`user_name`,`user_avatar`) VALUES('" . $openID . "','" . $name . "','" . $avatar . "')";
        $conn->query( $sql_add_a_user_record );
        $stmt = $conn->query( $sql_query_is_exist_by_openid );
        $arr = $stmt->fetch(PDO::FETCH_ASSOC);
        $uid = $arr['id'];
        echo $uid;
    }
}