<?php

// 二分查找-非递归版本
function binarySearch(array $arr, int $target)
{
    $low = 0;
    $high = count($arr) - 1;
    while ($low <= $high) {
        $mid = floor(($low + $high) / 2); // 或者使用intval()
        if ($target == $arr[$mid]) {
            return true;
        } elseif ($target > $arr[$mid]) {
            $low = $mid + 1;
        } else {
            $high = $mid - 1;
        }
    }
    return false;
}

// 二分查找-递归版本
function binarySearchRecursion(array $arr, int $needle, int $low, int $high)
{
    if ($high < $low) return false;
    $mid = intval(($low + $high) / 2);
    if ($needle > $arr[$mid]) {
        return binarySearchRecursion($arr, $needle, $mid + 1, $high);
    } elseif ($needle < $arr[$mid]) {
        return binarySearchRecursion($arr, $needle, $low, $mid - 1);
    } else {
        return true;
    }
}

$arr = [1, 2, 3, 13, 25, 65];
$rst = binarySearch($arr, 13); // 二分查找-非递归版本
$rst2 = binarySearchRecursion($arr, 65, 0, 5); // 二分查找-递归版本
var_dump($rst, $rst2);
/*输出
bool(true)
bool(true)
*/
