<?php
/**
 * @date: 2022/3/13
 * @createTime: 12:10 PM
 */

// Leetcode-209
// 思想：滑动窗口
function minSubArrayLen($target, $nums)
{
    $l = 0;
    $r = -1;
    $sum = 0;
    $res = count($nums) + 1;

    while ($l < count($nums)) {
        if ($r + 1 < count($nums) && $sum < $target)
            $sum += $nums[++$r];
        else
            $sum -= $nums[$l++];

        if ($sum >= $target)
            $res = min($res, $r - $l + 1);
    }

    if ($res == count($nums) + 1)
        return 0;

    return $res;
}