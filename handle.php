<?php
/**
 * File handle.php
 * Created by PhpStorm.
 * User: liuzhi
 * Date: 2018/7/2
 * Time: 19:16
 */
$ch1 = curl_init();
$ch2 = curl_init();

curl_setopt($ch1, CURLOPT_URL, "http://www.php.net");
curl_setopt($ch1, CURLOPT_HEADER, 0);

curl_setopt($ch2, CURLOPT_URL, "http://www.php.cn/");
curl_setopt($ch2, CURLOPT_HEADER, 0);

$mh = curl_multi_init();
curl_multi_add_handle($mh, $ch1);
curl_multi_add_handle($mh, $ch2);

$active = null;
do {
    $mrc = curl_multi_exec($mh, $active);
} while($mrc == CURLM_CALL_MULTI_PERFORM);
while($active && $mrc == CURLM_OK){
    if (curl_multi_select($mh) != -1){
        do {
            $mrc = curl_multi_exec($mh, $active);
        } while($mrc == CURLM_CALL_MULTI_PERFORM);
    }

}

curl_multi_remove_handle($mh, $ch1);
curl_multi_remove_handle($mh, $ch2);
curl_multi_close($mh);