<?php
/**
 * File interface.php
 * Created by PhpStorm.
 * User: liuzhi
 * Date: 2018/8/2
 * Time: 15:44
 */
interface A{
    public function fa();
    public function fb();
}

interface B
{
    public function fc();
    public function fd();
}

interface C extends A,B{

}

class M implements C{

    public function fa()
    {
        // TODO: Implement fa() method.
    }
    public function fb()
    {
        // TODO: Implement fb() method.
    }
    public function fc()
    {
        // TODO: Implement fc() method.
    }
    public function fd()
    {
        // TODO: Implement fd() method.
    }
}

abstract class N implements C
{

}