<?php

// 归并排序
// 时间复杂度：O(NlogN) 空间复杂度：O(N) 稳定
/*
工作原理：
归并排序是一种稳定的排序方法，将已有序的子序列合并，得到完整的有序的序列，即先使每个子序列有序，再使子序列段间有序。
算法描述：
a.把长度为n的输入序列分成两个长度为n/2的子序列；
b.对这两个子序列分别归并排序；
c.将两个排序好的子序列合并成一个最终的排序序列。
*/
function mergeSort($data)
{
    $len = count($data);
    if ($len < 2) {
        return $data;
    }
    $mid = floor($len / 2);
    $left = array_slice($data, 0, $mid);
    $right = array_slice($data, $mid);

    return merge(mergeSort($left), mergeSort($right));
}

function merge($left, $right)
{
    $result = array_merge($left, $right);
    $len = count($result);
    for ($index = 0, $i = 0, $j = 0; $index < $len; $index++) {
        if ($i >= count($left)) {
            $result[$index] = $right[$j++];
        } elseif ($j >= count($right)) {
            $result[$index] = $left[$i++];
        } elseif ($left[$i] > $right[$j]) {
            $result[$index] = $right[$j++];
        } else {
            $result[$index] = $left[$i++];
        }
    }
    return $result;
}

// 归并排序
$arr = [1, 4, 7, 10, 15, 8, 11, 13, 19, 24];
$rst = mergeSort($arr);
echo implode(" ", $arr) . PHP_EOL;
// "1 4 7 10 15 8 11 13 19 24"