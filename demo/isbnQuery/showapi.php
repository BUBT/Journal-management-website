<?php


$isbn = $_POST['isbn'] ?? '9787115473264';

if($isbn) {
    $res = queryIsbn($isbn);

    echo json_encode($res, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
}

function queryIsbn($isbn) {
    header("Content-Type:text/html;charset=UTF-8");
    date_default_timezone_set("PRC");
    $showapi_appid = '90555';  //替换此值,在官网的"我的应用"中找到相关值
    $showapi_secret = '94d2364e65344473b879c2662696b1ae';  //替换此值,在官网的"我的应用"中找到相关值
    $paramArr = array(
        'showapi_appid' => $showapi_appid,
        'isbn' => $isbn
        //添加其他参数
    );
    $param = createParam($paramArr, $showapi_secret);
    $url = 'http://route.showapi.com/1626-1?' . $param;
    // echo "请求的url:" . $url . "\r\n";
    $result = file_get_contents($url);
    // echo "返回的json数据:\r\n";
    // print $result . '\r\n';

    // echo json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    // echo $result;
    $arr = json_decode($result, true);

    // print_r(json_decode($result, true));

    // print_r($arr['showapi_res_body']['data']);
    return $arr['showapi_res_body']['data'];// 数组形式

    // $result = json_decode($result);
    // echo "\r\n取出showapi_res_code的值:\r\n";
    // print_r($result->showapi_res_code);
    // echo "\r\n";
}


//创建参数(包括签名的处理)
function createParam($paramArr, $showapi_secret)
{
    $paraStr = "";
    $signStr = "";
    ksort($paramArr);
    foreach ($paramArr as $key => $val) {
        if ($key != '' && $val != '') {
            $signStr .= $key . $val;
            $paraStr .= $key . '=' . urlencode($val) . '&';
        }
    }
    $signStr .= $showapi_secret; //排好序的参数加上secret,进行md5
    $sign = strtolower(md5($signStr));
    $paraStr .= 'showapi_sign=' . $sign; //将md5后的值作为参数,便于服务器的效验
    // echo "排好序的参数:" . $signStr . "\r\n";
    return $paraStr;
}