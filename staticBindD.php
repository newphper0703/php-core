<?php
/**
 * File staticBindD.php
 * Created by PhpStorm.
 * User: liuzhi
 * Date: 2018/8/2
 * Time: 19:34
 */
class A {
    public static function foo() {
        static::who();
    }

    public static function who() {
        echo __CLASS__."\n";
    }
}

class B extends A {
    public static function test() {
        A::foo();
        parent::foo();
        self::foo();
    }

    public static function who() {
        echo __CLASS__."\n";
    }
}
class C extends B {
    public static function who() {
        echo __CLASS__."\n";
    }
}

C::test();//输出结果为ACC