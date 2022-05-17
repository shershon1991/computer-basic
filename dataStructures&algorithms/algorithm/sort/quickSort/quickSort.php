<?php

// 快速排序
// 时间复杂度：O(N^2) 空间复杂度：O(NlogN) 不稳定
/*
工作原理：
将待排序记录分隔成独立的两个部分，其中一部分记录的关键字均比另一部分的关键字小，则可以分别对两部分记录继续进行排序，以达到整个序列有序。
算法描述:
a.从序列中挑出一个元素，成为“基准”;
b.重新排序数列，所有元素不基准值小的放在基准前面，所有元素比基准值大的放在基准后面。在这个分区退出之后，该基准就处于数列的中间位置，这个称为分区操作；
c.递归地把小于基准值元素的子数列和大于基准值元素的子序列排序。
*/
function quickSort($arr)
{
    $len = count($arr);
    // 因为是递归，所以如果最后的数组可能是空的也可能是1个，那么就没有可比较的了，直接返回
    if ($len <= 1) {
        return $arr;
    }
    $base = $min = $max = [];
    $baseItem = $arr[0];
    foreach ($arr as $v) {
        if ($v < $baseItem) {
            $min[] = $v;
        } elseif ($v > $baseItem) {
            $max[] = $v;
        } else {
            $base[] = $v;
        }
    }
    $min = quickSort($min);
    $max = quickSort($max);
    // 每次构造新的序列
    return array_merge($min, $base, $max);
}

// 快速排序
$arr = [31, 11, 73, 55, 22, 49, 91, 63];
$rst = quickSort($arr);
echo implode(" ", $rst) . PHP_EOL;
// "11 22 31 49 55 63 73 91"