<?php
/**
 * Created by PhpStorm.
 * User: Shershon
 * Date: 2019/8/28
 * Time: 9:42
 */

// 整数反转
function reverse($num)
{
    // 判断是否为负数(如果是负数，取绝对值调用本身，最后将结果转为负数)
    if ($num < 0) {
        return -reverse(-$num);
    }
    $res = 0;
    while ($num) {
        $res = $res * 10 + $num % 10;
        $num = floor($num / 10);
    }
    // 如果溢出就返回0
    if ($res < 0x7fffffff) {
        return $res;
    }
    return 0;
}

$num = 123;
$rst = reverse($num);
echo $rst;