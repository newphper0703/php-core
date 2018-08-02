<?php
/**
 * File swooleServer.php
 * Created by PhpStorm.
 * User: liuzhi
 * Date: 2018/8/1
 * Time: 14:22
 */
class Server {

    private $serv;

    public function __construct()
    {

        $this->serv = new swoole_server("0.0.0.0", 9501);
        $this->serv->set([
            'worker_num' => 8,//设置启动的worker进程数量
            'daemonize' => false, //关闭守护进程
        ]);

        $this->serv->on('Start', [$this, 'onStart']);
        $this->serv->on('Connect', [$this, 'onConnect']);
        $this->serv->on('Receive', [$this, 'onReceive']);
        $this->serv->on('Close', [$this, 'onClose']);


//        $this->serv = new swoole_server('192.168.33.18', 9501);
//        $this->serv->addlistener("127.0.0.1", 9502, SWOOLE_TCP);
        $this->serv->start();
    }

    public function onStart($serv)
    {
        echo "Start\n";
    }

    public function onConnect($serv, $fd, $from_id)
    {
        $serv->send($fd, "Hello {$fd}!");
    }

    public function onReceive(swoole_server $serv, $fd, $from_id, $data)
    {
        echo "get message from client {$fd}:{$data}\n";
        $serv->send($fd, $data);

//        $info = $serv->connection_info($fd, $from_id);
//
//        if ($info['from_port'] == 9502) {
//            $serv->send($fd, "welcome admin\n");
//        } else {
//            $serv->send($fd, 'swoole :'.$data);
//        }
    }

    public function onClose($serv, $fd, $from_id)
    {
        echo "Client {$fd} close connection \n";
    }
}

$server  = new Server();