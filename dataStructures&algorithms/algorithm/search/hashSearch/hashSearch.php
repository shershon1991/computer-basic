<?php
/**
 * @date: 2022/3/21
 * @createTime: 11:42 AM
 */

// 哈希查找
function hashSearch(array $arr, int $target)
{
    return isset($arr[$target]);
}

$arr = ['1' => 10, '3' => 30, '5' => 50];
$rst = hashSearch($arr, 30);
var_dump($rst);// bool(false)