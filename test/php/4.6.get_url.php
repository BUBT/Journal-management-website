<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

use app\lib\Utils;

$html = <<<HTML
<p><img src="http://localhost:8081/src/data/img/20190310_05_19_33.png" style="max-width:100%;"><br></p><p><img src="http://localhost:8081/src/data/img/20190310_05_19_40.png" style="max-width:100%;"><br></p>
HTML;

$arr = Utils::get_img_url_in_string($html);

var_dump($arr);