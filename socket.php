<?php
/**
 * File socket.php
 * Created by PhpStorm.
 * User: liuzhi
 * Date: 2018/7/2
 * Time: 17:11
 */

$host = "192.168.33.18";
$port = 12345;
set_time_limit(0);
$socket = socket_create(AF_INET, SOCK_STREAM, 0) or die("could not create socket.\n");
$result = socket_bind($socket, $host, $port) or die("could not bind socket.\n");
$result = socket_listen($socket, 3) or die("could not set up socker listener.\n");

$spawn = socket_accept($socket) or die("could not accept incoming connection.\n");
$input = socket_read($spawn, 1024) or die("could not read input.\n");
$input = trim($input);

$output = strrev($input)."\n";
socket_write($spawn, $output, strlen($output)) or die("could not write output.\n");
socket_close($spawn);
socket_close($socket);

die;
$sock = fsockopen('192.168.33.18', 8001, $errno, $errstr, 1);
if (!$sock){
    echo "$errstr($errno)<br/>\n";
} else {
    socket_set_blocking($sock, false);
    fwrite($sock, "sending data ......\r\n");



    fwrite($sock, "end\r\n");
    while(!feof($sock)){
        echo fread($sock, 128);
        flush();
        ob_flush();
        sleep(1);
    }
    fclose($sock);
}
