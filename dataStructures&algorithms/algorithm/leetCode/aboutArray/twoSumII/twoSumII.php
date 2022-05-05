<?php
/**
 * @date: 2022/3/13
 * @createTime: 2:29 PM
 */

// Leetcode-167
// 时间复杂度：O(N) 空间复杂度：O(1)
function twoSum($numbers, $target)
{
    $left = 1;
    $right = count($numbers);
    $res = [];

    while ($left < $right) {
        if ($numbers[$left - 1] + $numbers[$right - 1] == $target) {
            $res = [$left, $right];
            break;
        } elseif ($numbers[$left - 1] + $numbers[$right - 1] > $target) {
            $right--;
        } else {
            $left++;
        }
    }
    return $res;
}