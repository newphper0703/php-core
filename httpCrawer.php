<?php
/**
 * File httpCrawer.php
 * Created by PhpStorm.
 * User: liuzhi
 * Date: 2018/7/2
 * Time: 15:43
 */
$html = file_get_contents('http://www.emaooa.com');
print_r($http_response_header);
$fp = fopen('http://www.emaooa.com', 'r');
print_r(stream_get_meta_data($fp));
fclose($fp);