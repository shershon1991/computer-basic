<?php

// 插入排序算法-希尔排序
// 时间复杂度：O(N^2) 空间复杂度：O(1) 不稳定
/*
思路：
希尔排序也是一种插入排序，它是简单插入排序经过改进之后的一个更高效的版本，也成为缩小增量排序。希尔排序是把记录按一定的增量分组，对每组使用直接插入算法，随着增量逐渐减少，每组包含的关键词越来越多，当增量减少至1时，整个文件恰被分成一组，算法便终止.
*/
function shellSort(array $arr)
{
    $len = count($arr);
    if ($len == 0) {
        return $arr;
    }
    $gap = floor($len / 2);
    while ($gap > 0) {
        for ($i = 0; $i < $len; $i++) {
            $current = $arr[$i];
            $preIndex = $i - $gap;
            while ($preIndex >= 0 && $arr[$preIndex] > $current) {
                $arr[$preIndex + $gap] = $arr[$preIndex];
                $preIndex -= $gap;
            }
            $arr[$preIndex + $gap] = $current;
        }
        $gap = floor($gap / 2);
    }
    return $arr;
}

// 插入排序算法-希尔排序
$arr = [80, 93, 60, 12, 42, 30, 68, 85, 10];
$rst = shellSort($arr);
echo implode(" ", $rst) . PHP_EOL;
// "10 12 30 42 60 68 80 85 93"