<?php

/**
 * Interface Cache
 * 接口和类一样，接口也可以继承接口
 */
interface Cache {
    //常量
    const maxKey = 10000;

    //访问控制符 默认是public
    public function getc($key);
    public function setc($key, $value);
    public function flush();
}
