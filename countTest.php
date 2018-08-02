<?php
/**
 * File count.php
 * Created by PhpStorm.
 * User: liuzhi
 * Date: 2018/7/2
 * Time: 18:17
 */
$a = 'arr';
echo count($a)."\n";

$b = 1;
echo count($b)."\n";

$c = [];
echo count($c)."\n";

$d = [[]];
echo count($d)."\n";

$e = [1,2];
echo count($e)."\n";

$f = [[1,2]];
echo count($f)."\n";

$f = [[1], [2]];
echo count($f)."\n";