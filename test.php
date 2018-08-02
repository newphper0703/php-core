<?php

class MyClass {
    public $var = "my value in MyClass.\n";
}

class MySubClass extends MyClass {

    public $var = "my value in MySubClass.\n";

}

class MySub2Class extends MyClass {

}


$obj = new MySubClass();
echo $obj->var;
$obj2 = new MySub2Class();
echo $obj2->var;

