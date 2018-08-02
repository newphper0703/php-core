<?php
/**
 * File staticBindC.php
 * Created by PhpStorm.
 * User: liuzhi
 * Date: 2018/8/2
 * Time: 19:31
 */
class A {
    private function foo(){
        echo "success!\n";
    }

    public function test(){
        $this->foo();
        static::foo();
    }
}

class B extends A {

}

class C extends A {
    private function foo(){

    }
}

$b = new B();
$b->test();
$c = new C();
$c->test();
//success!
//success!
//success!