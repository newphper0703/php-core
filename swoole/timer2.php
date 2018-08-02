<?php //每隔2000ms触发一次 
$num = 0; 
$timer = swoole_timer_tick(2000, function ($timer_id) {
 global $num;
 $num++; 
echo "tick-2000ms $num\n"; 
}); 
//3000秒后执行此函数 
swoole_timer_after(5000, function () { global $timer; swoole_timer_clear($timer); echo "after 5000ms.\n"; });
