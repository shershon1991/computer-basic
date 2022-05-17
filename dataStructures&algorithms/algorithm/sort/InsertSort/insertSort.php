<?php

// 选择排序
// 插入排序算法-直接插入
// 时间复杂度：O(N^2) 空间复杂度：O(1) 稳定
/*
工作原理：
通过构建有序序列，对于未排序序列，在已排序序列中从后向前扫描，找到相应的位置并插入。在从后向前扫描过程中，需要反复把已排序元素向后挪位，为最新元素提供插入空间，直到排序完成，如果碰到一个和插入元素相等的，那么插入的元素放在相等元素的后面。
算法描述：
a.从第一个元素开始，该元素可以认为已经被排序；
b.去除下一个元素，在已排序的元素序列中从后向前扫描；
c.如果被扫描的元素（已排序）大于新元素，将该元素移到下一位置；
d.重复步骤c，直到找到已排序的元素的小于或等于新元素的位置；
e.将新元素插入到该元素的位置后；
f.重复步骤b~e;
*/
function insertSort($arr)
{
    $len = count($arr);
    if ($len == 0) {
        return $arr;
    }

    for ($i = 0; $i < $len - 1; $i++) {
        $current = $arr[$i + 1];
        $preIndex = $i;
        while ($preIndex >= 0 && $current < $arr[$preIndex]) {
            $arr[$preIndex + 1] = $arr[$preIndex];
            $preIndex--;
        }
        $arr[$preIndex + 1] = $current;
    }
    return $arr;
}

// 插入排序算法-直接插入
$arr = [3, 1, 7, 5, 2, 4, 9, 6];
$rst = insertSort($arr);
echo implode(" ", $rst) . PHP_EOL;
// "1 2 3 4 5 6 7 9"
