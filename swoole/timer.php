<?php
$i = 1;
$execStartTime = time();
$execEndTime  = time() + 60;
while(((strtotime($startTime)+$interval*($num+$i))>=$execStartTime) && ((strtotime($startTime)+$interval*($num+$i))<=$execEndTime)){
    $i++;
}
$addNum = $i-1;
$newInterval = round(60/$addNum)*1000;
$newInterval = 1000;
$timer = swoole_timer_tick($newInterval, function ($timer_id) use ($bidderMsg) {
    echo "timer_id:".$timer_id;

});
die;
$now = time();
echo date('Y-m-d H:i:s')."\n";
$last = $now + 60;
echo date('Y-m-d H:i:s', $last)."\n";
$num = 0; $i = 1;
$interval = 1.5*60;
$shelfTime = '2018-07-28 8:19:00';
echo date('Y-m-d H:i:s', strtotime($shelfTime)+$interval*($i))."\n";
while(((strtotime($shelfTime)+$interval*($num+$i))>=$now) && ((strtotime($shelfTime)+$interval*($num+$i))<=$last)){
    $i++;
}
echo $i-1;
die;
$bidderUser = HelpUtil::makeBidderUserId();
$bidderUserKey = "pay:deposit:bidderuser:999999999";
$a = Redis::sadd($bidderUserKey, $bidderUser);
$bidderUserArr = Redis::smembers($bidderUserKey);
$bidderUser  = $bidderUserArr ? $bidderUserArr[array_rand($bidderUserArr)] : '';
var_dump($a, $bidderUser);die;
foreach ([1000, 2000, 3000] as $k =>$v){
    echo time()."\n";
    swoole_timer_after(1000, function (){
        echo time()."  1000\n";
    });
    swoole_timer_after(2000, function (){
        echo time()."  2000\n";
    });
    swoole_timer_after(3000, function (){
        echo time()."  3000\n";
    });
}
die;
//$data = [ ['time' => 1], ['time' => 2], ['time' => 3]];
//foreach ($data as $k => $v) {
//   echo time()."\n";
//    echo $v['time']."\n";
//     sleep($v['time']);
//    continue;
//}
//die;
//每隔2000ms触发一次
$num = 0;
$now = time();
echo "$now\n";
//$interval = 60000;
$a = [10000, 20000, 30000];
foreach ($a as $k => $interval) {
//    swoole_timer_after($interval, function () use ($interval){
//        swoole_timer_after($interval, function () use ($interval){
//            echo $interval."\n";
//            $timer = swoole_timer_tick($interval, function ($timer_id) use ($interval) {
//
//                global $num;
//                $num++;
//                $now1 = time();
//                $diff = $now1;
//                echo "$diff\n";
//                //echo "tick- 60000ms $num\n";
//            });
//        });


//    });
    swoole_timer_tick($interval, function () use ($interval){

        global $num;
        echo $interval."\n";
        echo $num."\n";
        echo time()."tttt";
        swoole_timer_after($interval, function () use ($num){
            echo $num."\n";
           $num++;
           echo $num."\n";
           echo time()."aaaa";
        });
    });
}

die;
$timer = swoole_timer_tick(2000, function ($timer_id) {
  global $num;
  $num++;
  $now1 = time();
  $diff = $now1;
  echo "$diff\n";
  echo "tick-2000ms $num\n";
}); 
//3000秒后执行此函数 
swoole_timer_after(5000, function () {
   global $timer;
   swoole_timer_clear($timer);
 $now2 = time();
 $diff = $now2;
 echo "$diff\n";
   echo "after 5000ms.\n";
});
