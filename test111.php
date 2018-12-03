<?php
/**
 * File test111.php
 * Created by PhpStorm.
 * User: liuzhi
 * Date: 2018/8/6
 * Time: 17:37
 */

$arr =  [['A' => 11, 'B' => 21], ['A' => 12, 'B' => 22]];
foreach ($arr as $k => $v) {
    if (! empty($v['A'])) {
        $a[trim($v['A'])] = trim($v['B']);
    }
}
var_dump($a);die;
$timestamps1 = strtotime( '+1 day' );
$timestamps2 = strtotime( '+2 day' );

echo date('Y-m-d H:i:s', $timestamps1)."\n";
echo date('Y-m-d H:i:s', $timestamps2)."\n";
echo date('Y-m-d 00:00:00', $timestamps1)."\n";
echo date('Y-m-d 23:59:59', $timestamps1)."\n";