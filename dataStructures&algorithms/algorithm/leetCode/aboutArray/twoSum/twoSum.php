<?php
/**
 * @date: 2022/3/14
 * @createTime: 11:37 AM
 */

// Leetcode-1
// 暴力解法
// 时间复杂度:O(N^2) 空间复杂度:O(1)
function twoSum1($nums, $target)
{
    for ($i = 0, $m = count($nums); $i < $m - 1; $i++) {
        for ($j = $i + 1, $n = count($nums); $j < $n; $j++) {
            if ($nums[$i] + $nums[$j] == $target) {
                return [$i, $j];
            }
        }
    }
    return [];
}

// 时间复杂度: O(N) 空间复杂度: O(N)
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
