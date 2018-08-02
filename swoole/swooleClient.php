<?php
/**
 * File swooleClient.php
 * Created by PhpStorm.
 * User: liuzhi
 * Date: 2018/8/1
 * Time: 14:44
 */
class Client
{
    private $client;

    public function __construct()
    {
        $this->client = new swoole_client(SWOOLE_SOCK_TCP);
    }

    public function connect()
    {
        if (! $this->client->connect('127.0.0.1', 9501, 1)){
            echo "Error {$this->client->errMsg}[{$this->client->errCode}]\n";
        }

        fwrite(STDOUT, "PLEASE INPUT MSG:");
        $msg = trim(fgets(STDIN));
        $this->client->send($msg);

        $message = $this->client->recv();
        echo "get message from server:{$message}\n";
    }
}

$client = new Client();
$client->connect();