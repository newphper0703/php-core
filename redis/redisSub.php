<?php
/**
 * File redisSub.php
 * Created by PhpStorm.
 * User: liuzhi
 * Date: 2018/7/26
 * Time: 16:03
 */
$redis = new Redis();
$res = $redis->pconnect('127.0.0.1', 6379, 0);
$redis->subscribe(array('test'), 'callback');

function callback($instance, $channelName, $message){
    echo $channelName, "==>", $message, PHP_EOL;
}