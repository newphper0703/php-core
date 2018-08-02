<?php
/**
 * File static.php
 * Created by PhpStorm.
 * User: liuzhi
 * Date: 2018/8/2
 * Time: 16:16
 */
class Foo {
    public static $my_static = 'foo';
    public function staticFunc()
    {
        return self::$my_static;
    }
}