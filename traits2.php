<?php
class Base
{
	public function Hello()
	{
		echo "method hello from class Base!"."<br>";
	}
}
trait Hello
{
    public function Hello()
    {
         echo "method Hello from trait hello!"."<br>";
    }
   
     public function Hi()
    {
         echo "method Hi from trait hello!"."<br>";
    }

    abstract public function getValue();
    static public function staticMethod()
    {
        echo "static method staticMethod from Trait Hello"."<br>";
    }

    public function staticValue()
    {
        static $value;
        $value++;
        echo "$value"."<br>";
    }

}

trait Hi
{
    public function hello()
    {
        parent::hello();
        echo 'method hello from trait hi!'.'<br>';
    }

    public function hi()
    {

        echo 'method hi from trait hi!'.'<br>';
    }

}

trait HelloHi
{
    use Hello,Hi{
        Hello::hello insteadof Hi;
        Hi::hi insteadof Hello;
    }
}

class MyNew extends Base
{
    use HelloHi;
    private $value = 'class MyNew'.'<br>';
    public function hi(){
        echo 'method hi from class MyNew'.'<br>';
    }

    public function getValue(){
        return $this->value;
    }

}

$obj = new MyNew();
$obj->hello();

$obj->hi();

MyNew::staticMethod();

echo $obj->getValue();

$objOther = new MyNew();
$obj->staticValue();
$objOther->staticValue();



