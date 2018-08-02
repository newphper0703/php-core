<?php
/**
 * File useStatic.php
 * Created by PhpStorm.
 * User: liuzhi
 * Date: 2018/8/2
 * Time: 16:25
 * https://www.cnblogs.com/ddddemo/p/5630137.html
 */
class UseFoo
{
    static public function index()
    {
        $eof = "<br/>";

        echo Foo::$my_static,1,$eof; //静态属性的调用方式

        $foo = new Foo();
        echo $foo->staticFunc(),2,$eof;

        //echo $foo->my_static,3,$eof;//报错，因为不能使用->方式调用静态属性

        echo $foo::$my_static,4,$eof;

        $newfoo  = 'Foo';
        echo $newfoo::$my_static,5,$eof;// As of PHP 5.3.0

        echo SonFoo::$my_static,6,$eof;

        $sonfoo = new SonFoo();
        echo $sonfoo->sonStatic(),7,$eof;

    }


}
useFoo::index();