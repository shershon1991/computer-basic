<?php

// 顺序查找
function linearSearch(array $arr, int $needle) {
    for($i = 0, $count = count($arr); $i < $count; $i++) {
        if($arr[$i] == $needle) {
            return true;
        }
    }

    return false;
}

// 二分查找
function binarySearch(array $arr, int $target)
{
    $low = 0;
    $high = count($arr) - 1;
    while($low <= $high) {
        $mid = intval(($low + $high) / 2);

        if($arr[$mid] == $target) {
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
function binarySearchRecursion(array $arr, int $needle, int $low, int $high) {
    if($high < $low)
        return false;
    $mid = intval(($low + $high) / 2);
    if($arr[$mid] > $needle) {
        return binarySearchRecursion($arr, $needle, $low, $mid - 1);
    } elseif($arr[$mid] < $needle) {
        return binarySearchRecursion($arr, $needle, $mid + 1, $high);
    } else {
        return true;
    }
}