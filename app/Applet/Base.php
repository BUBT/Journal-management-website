<?php

namespace app\applet;

class Base 
{
    public function __construct()
    {
        return $this;
    }

    public static function code2openid($code, $config = '/app/config/journalWX.php')
    {
        $config = require_once( $config );
        $appid = $config['appid'];
        $secret = $config['secret'];
        $url = "https://api.weixin.qq.com/sns/jscode2session?appid=$appid&secret=$secret&js_code=$code&grant_type=authorization_code";

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, $url);
        curl_setopt($curl, CURLOPT_TIMEOUT, 500);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_URL, $url);
        $data = curl_exec($curl);
        curl_close($curl);

        $data_arr = json_decode($data, true);
        $openid = $data_arr['openid'];
        return $openid;
    }
}