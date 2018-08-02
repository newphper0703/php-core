<?php
/**
 * File staticBind.php
 * Created by PhpStorm.
 * User: liuzhi
 * Date: 2018/8/2
 * Time: 16:33
 */
class StaticBindA
{
    public static function who() {
        echo __CLASS__;
    }
    public static function test() {
        self::who();
    }
}

class StaticBindB extends StaticBindA {
    public static function who() {
        echo __CLASS__;
    }
}

B::test();//输出A
