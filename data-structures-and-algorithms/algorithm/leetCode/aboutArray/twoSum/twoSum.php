<?php
/**
 * @date: 2022/3/14
 * @createTime: 11:37 AM
 */

// Leetcode-1
// 暴力解法
function twoSum1($nums, $target)
{
    for ($i = 0, $m = count($nums); $i < $m - 1; $i++) {
        $left = $target - $nums[$i];
        for ($j = $i + 1, $n = count($nums); $j < $n; $j++) {
            if ($nums[$j] == $left) {
                return [$i, $j];
            }
        }
    }
    return [];
}

function twoSum2($nums, $target)
{
    $record = [];
    for ($i = 0, $m = count($nums); $i < $m; $i++) {
        $left = $target - $nums[$i];
        if (in_array($left, $record)) {
            $leftIndex = array_search($left, $record);
            return [$leftIndex, $i];
        }
        $record[$i] = $nums[$i];
    }
    return [];
}

