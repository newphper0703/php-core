<?php
/**
 * File testSmtp.php
 * Created by PhpStorm.
 * User: liuzhi
 * Date: 2018/7/3
 * Time: 15:22
 */
include("stmpMail.php");


$host = "smtp.qq.com";
$port = 25;
//$user = "1352802336@qq.com";
$user = "1634507161@qq.com";
$pass = "";
//$pass = "inyamclzchfyifcf";


//$from = "1352802336@qq.com";
//$to = "1634507161@qq.com";

$from = "1634507161@qq.com";
$to = "1352802336@qq.com";
$subject = "hello";
$content = "example email";

$mail = new stmpMail($host, $port, $user, $pass);

$res = $mail->sendMail($from, $to, $subject, $content);
var_dump($res);

