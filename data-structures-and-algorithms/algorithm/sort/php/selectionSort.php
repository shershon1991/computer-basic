<?php

// 选择排序-简单选择排序
/*
选择排序（Selection Sort）是一种简单直观的排序算法。它的工作原理如下，首先在未排序序列中找到最小（大）元素，
存放到排序序列的起始位置，然后，再从剩余未排序元素中继续寻找最小（大）元素，然后放到已排序序列的末尾。以此类推，
直到所有元素均排序完毕。
*/
function selectSort($arr)
{
    $len = count($arr);
    for ($i = 0; $i < $len - 1; $i++) {
        // 默认第一个是最小值
        $min = $i;
        // 注意这里是从$i + 1 开始遍历剩余的元素，选出最小值
        for ($n = $i + 1; $n < $len; $n++) {
            if ($arr[$n] < $arr[$min]) {
                $min = $n;
            }
        }
        // 如果最小值不是当前默认的最小值，那么进行替换
        if ($min != $i) {
            $t = $arr[$i];
            $arr[$i] = $arr[$min];
            $arr[$min] = $t;
        }
    }
    return $arr;
}

// 选择排序-简单选择排序
$arr = [10, 68, 12, 30, 42, 80, 85, 93, 60];
$rst = selectSort($arr);
echo implode(" ", $rst) . PHP_EOL;
// "10 12 30 42 60 68 80 85 93"