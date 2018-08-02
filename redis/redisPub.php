<?php
/**
 * File redisPub.php
 * Created by PhpStorm.
 * User: liuzhi
 * Date: 2018/7/26
 * Time: 16:09
 */
$redis = new Redis();
$res = $redis->pconnect('127.0.0.1', 6379);
$res = $redis->publish('test', 'hello, world');