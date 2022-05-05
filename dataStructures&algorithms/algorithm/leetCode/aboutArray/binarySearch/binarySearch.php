<?php

// 二分查找，leetCode-704
// 非递归
function binarySearch($arr, $target)
{
    $low = 0;
    $high = count($arr) - 1;
    while ($low <= $high) {
        $mid = floor(($low + $high) / 2);
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

// 递归
function binarySearchRecursion($arr, $target, $low, $high)
{
    if ($low > $high) return false;
    $mid = floor(($low + $high) / 2);
    if ($target == $arr[$mid]) {
        return true;
    } elseif ($target > $arr[$mid]) {
        return binarySearchRecursion($arr, $target, $mid + 1, $high);
    } else {
        return binarySearchRecursion($arr, $target, $low, $mid - 1);
    }
}