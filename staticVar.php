<?php
/**
 * File staticVar.php
 * Created by PhpStorm.
 * User: liuzhi
 * Date: 2018/8/2
 * Time: 16:31
 */

    function test($id)
    {
        static $count=0;
        echo "{$id}=>count is ：".$count."<br/>";
        $count++;
    }

    function test2($end)
    {
        static $sum=0;
        if($end>0){
            $sum +=$end;
            $end--;
            test2($end);
        }
        return $sum;
    }

test(1);
test(2);
test(3);

test2(10);