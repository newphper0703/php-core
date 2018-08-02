<?php
/**
 * File staticBindB.php
 * Created by PhpStorm.
 * User: liuzhi
 * Date: 2018/8/2
 * Time: 19:27
 */
class A {
    public static function who(){
        echo __class__;
    }

    public static function get(){
        static::who();
    }
}

class B extends A {
    public static function who(){
        echo __class__;
    }
}

B::test(); //输出B