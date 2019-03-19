<?php
$ch = curl_init("http://localhost:8081/src/issues/好的撒旦__1552845582.html");

curl_setopt($ch, CURLOPT_NOBODY, true);
curl_exec($ch);
$retcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
// $retcode >= 400 -> not found, $retcode = 200, found.
curl_close($ch);

echo $retcode;