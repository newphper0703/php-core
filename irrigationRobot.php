<?php
/**
 * File irrigationRobot.php
 * Created by PhpStorm.
 * User: liuzhi
 * Date: 2018/7/2
 * Time: 15:49
 */
$data = [
    'author' => 'liuzhi',
    'mail' => '1352802336@qq.com',
    'text' => 'wonderful',
];
$data = http_build_query($data);
$opts = [
    'http' => [
        'method' => 'POST',
        'header' => "Content-type:application/x-www-form-urlencoded\r\n". "Content-Length:" . strlen($data) . "\r\n",
                    'content' => $data
    ],
];
$context = stream_context_create($opts);
$html = @file_get_contents("http://aiyooyoo.com",false, $context);