<?php
/**
 * File swooleTimer.php
 * Created by PhpStorm.
 * User: liuzhi
 * Date: 2018/8/1
 * Time: 15:28
 */
class Test{

    private $str = "Say Hello\n";

    public function onAfter()
    {
        echo $this->str;
    }
}

$test = new Test();
swoole_timer_after(1000, [$test, "onAfter"]);

swoole_timer_after(2000, function ()use ($test){
    $test->onAfter();
});