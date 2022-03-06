<?php

// 快速排序
/*
分治法的基本思想是：将原问题分解为若干个规模更小但结构与原问题相似的子问题。递归地解这些子问题，
然后将这些子问题的解组合为原问题的解。
利用分治法可将快速排序的分为三步：
1.在数据集之中，选择一个元素作为”基准”（pivot）。
2.所有小于”基准”的元素，都移到”基准”的左边；所有大于”基准”的元素，都移到”基准”的右边。这个操作称为分区 (partition)
 操作，分区操作结束后，基准元素所处的位置就是最终排序后它的位置。
3.对”基准”左边和右边的两个子集，不断重复第一步和第二步，直到所有子集只剩下一个元素为止。
*/
function quickSort($arr)
{
    $len = count($arr);
    // 因为是递归，所以如果最后的数组可能是空的也可能是1个，那么就没有可比较的了，直接返回
    if ($len <= 1) {
        return $arr;
    }
    $base = $min = $max = [];
    $base_item = $arr[0];
    for ($i = 0; $i < $len; $i++) {
        if ($arr[$i] < $base_item) {
            $min[] = $arr[$i];
        } elseif ($arr[$i] > $base_item) {
            $max[] = $arr[$i];
        } else {
            $base[] = $arr[$i];
        }
    }

    $min = quickSort($min);
    $max = quickSort($max);

    // 每次构造新的序列
    return array_merge($min, $base, $max);
}

// 快速排序
$arr = [3, 1, 7, 5, 2, 4, 9, 6];
$rst = quickSort($arr);
echo implode(" ", $rst) . PHP_EOL;
// "1 2 3 4 5 6 7 9"