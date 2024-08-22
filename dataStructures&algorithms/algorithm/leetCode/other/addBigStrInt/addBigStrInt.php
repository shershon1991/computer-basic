<?php
/**
 * @date: 2022/6/1
 * @createTime: 11:59 AM
 */

/**
 * Desc:
 * Author: Shershon(tanxiaoshan@weimiao.cn)
 * DateTime: 2022/6/1 12:15 PM
 * @param string $a
 * @param string $b
 * @return string
 */
function add(string $a, string $b)
{
    $lenA = strlen($a);
    $lenB = strlen($b);

    $j = 0; // 进位数
    $res = '';
    for ($indexA = $lenA - 1, $indexB = $lenB - 1; ($indexA >= 0 || $indexB >= 0); --$indexA, --$indexB) {
        $itemA = ($indexA >= 0) ? (int)$a[$indexA] : 0;
        $itemB = ($indexB >= 0) ? (int)$b[$indexB] : 0;
        $sum = $itemA + $itemB + $j;
        if ($sum >= 10) {
            $j = 1;
            $sum = $sum - 10;
        } else {
            $j = 0;
        }
        $res = (string)$sum . $res;
    }
    if ($j > 0) {
        $res = (string)$j . $res;
    }

    return $res;
}

$a = '22222222222222222222222222222';
$b = '99999999999999999999999999999';
echo add($a, $b) . PHP_EOL;
/*echo PHP_INT_MIN . PHP_EOL;
echo PHP_INT_MAX . PHP_EOL;
echo PHP_INT_SIZE . PHP_EOL;*/