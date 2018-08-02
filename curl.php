<?php
/**
 * File curl.php
 * Created by PhpStorm.
 * User: liuzhi
 * Date: 2018/7/2
 * Time: 18:17
 */
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "http://www.php.net");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HEADER, 1);

$output = curl_exec($ch);

$info = curl_getinfo($ch);
var_dump($info);
echo "get ".$info['url']." cost ".$info['total_time']." secs";
if ($output === false) {
    echo "curl error:".curl_error($ch);
}
curl_close($ch);
//echo $output;
