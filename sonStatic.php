<?php
/**
 * File sonStatic.php
 * Created by PhpStorm.
 * User: liuzhi
 * Date: 2018/8/2
 * Time: 16:18
 */
class SonFoo extends Foo
{
    public function sonStatic()
    {
        return parent::$my_static;
    }
}