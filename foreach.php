<?php
/**
 * File foreach.php
 * Created by PhpStorm.
 * User: liuzhi
 * Date: 2018/7/9
 * Time: 12:23
 */
//echo 111;
$a  = [[1, 10, 15], [1, 10, 15], [1, 10, 15]];
//var_dump($a);die;
for ($i = 0; $i < count($a)*count($a); $i++){
    $pid = pcntl_fork();

    if ($pid == -1) {
        die("could not fork");

    } elseif ($pid) {
        echo "I'm the Parent $i\n";

    } else {// �ӽ��̴���
        foreach ($a as $k => $v) {
            foreach ($v as $kk => $vv) {

                $microtime = microtime();
                if ($vv == 10) {
                    sleep($vv);
                } else if ($vv < 10) {
                    sleep(5);
                } else if ($vv > 10) {
                    sleep($vv);
                }
                echo "activity " . ($k+1) . " ,  msg task". ($kk+1) .  ",  $vv \n";
            }
        }
        // ҵ���� begin

        // ҵ���� end

        exit;// һ��Ҫע���˳��ӽ���,����pcntl_fork() �ᱻ�ӽ�����fork,���������ϵ�Ӱ�졣
    }
}
die;
if (count($a) > 1) {
    foreach ($a as $v) {
        foreach ($v as $vv)
        {
            echo $vv;
            if ($vv == 10) {
                sleep($vv);
//                break;
                continue;
            }
        }
//        if ($v[1] == 10) {
//            sleep($v[1]);
//            break;
//        }


    }
}
