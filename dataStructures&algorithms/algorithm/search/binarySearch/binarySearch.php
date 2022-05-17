<?php

// 二分查找-非递归版本
// 时间复杂度：O(logN)
function binarySearch(array $arr, int $target)
{
    $low = 0;
    $high = count($arr) - 1;
    while ($low <= $high) {
        $mid = floor(($low + $high) / 2);
        if ($arr[$mid] == $target) {
            return true;
        } elseif ($arr[$mid] > $target) {
            $high = $mid - 1;
        } else {
            $low = $mid + 1;
        }
    }
    return false;
}

// 二分查找-递归版本
// 时间复杂度：O(logN)
function binarySearchRecursion(array $arr, int $target, int $low, int $high)
{
    if ($low > $high) return false;
    $mid = floor(($low + $high) / 2);
    if ($arr[$mid] == $target) {
        return true;
    } elseif ($arr[$mid] > $target) {
        return binarySearchRecursion($arr, $target, $low, $mid - 1);
    } else {
        return binarySearchRecursion($arr, $target, $mid + 1, $high);
    }
}

$arr = [1, 2, 3, 13, 25, 65];
$rst = binarySearch($arr, 25);
$rst2 = binarySearchRecursion($arr, 65, 0, 5);
var_dump($rst);
var_dump($rst2);
/*输出
bool(true)
bool(true)
*/
