<?php
trait hello
{
    public function sayHello()
    {
       echo "hello ";
    }
}

trait world
{
    public function sayWorld()
    {
        echo "world ";
    }
}

class MyHelloWorld
{
    use hello, world;
    public function sayMark()
    {
        echo "!";
    }
}

$o = new MyHelloWorld();
$o->sayHello();
$o->sayWorld();
$o->sayMark();

