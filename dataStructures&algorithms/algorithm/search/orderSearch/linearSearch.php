<?php

// 顺序查找
// 时间复杂度：O(N)
function orderSearch(array $arr, int $needle)
{
    /*for ($i = 0, $count = count($arr); $i < $count; $i++) {
        if ($arr[$i] == $needle) {
            return true;
        }
    }*/
    foreach ($arr as $v) {
        if ($v == $needle) {
            return true;
        }
    }
    return false;
}

// 顺序查找
$arr = [1, 13, 2, 45, 67, 12];
$rst = orderSearch($arr, 45);
var_dump($rst);
// bool(true)
