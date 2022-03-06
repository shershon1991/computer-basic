<?php

// 归并排序
/*
思路：
1.把 n 个记录看成 n 个长度为 l 的有序子表
2.进行两两归并使记录关键字有序，得到 n/2 个长度为 2 的有序子表
3.重复第 2 步直到所有记录归并成一个长度为 n 的有序表为止。
*/
function mergeSort($arr, $left, $mid, $right)
{
    $aIndex = $left == $mid ? -1 : $left;
    $bIndex = $mid == $right ? -1 : $mid;
    $crr = [];

    while (($aIndex >= $left && $aIndex < $mid) || ($bIndex >= $mid && $bIndex <= $right)) {
        $aValue = $arr[$aIndex] ?? null;
        $bValue = $arr[$bIndex] ?? null;
        if (($aIndex < $left || $aIndex >= $mid) || ($bValue < $aValue && $bValue != null)) {
            $crr[] = $bValue;
            $bIndex++;
        } else {
            $crr[] = $aValue;
            $aIndex++;
        }
    }

    for ($i = 0; $i < ($right - $left); $i++) {
        $arr[$i + $left] = $crr[$i];
    }

    return $arr;
}

// 归并排序
$arr = [1, 4, 7, 10, 15, 8, 11, 13, 19, 24];
$rst = mergeSort($arr, 0, 5, 9);
echo implode(" ", $arr) . PHP_EOL;
// "1 4 7 10 15 8 11 13 19 24"