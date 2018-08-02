<?php
$obj = new ReflectionClass('person');
class person
{
    public $name;
    public $gender;

    public function say()
    {
        echo $this->name, "\t is", $this->gender, "\n";
    }

    public function __set($name, $value)
    {
        echo "setting $name to $value \r\n";
        $this->name = $value;
    }

    public function __get($name)
    {
        if(!isset($this->name)) {
            echo "undefined";
            echo "it is setting now!";
        }
        return $this->name;
    }

}

$student = new person();
$student->name = 'tom';
$student->gender = 'male';
$student->age = 20;