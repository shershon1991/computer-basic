<?php
/**
 * @date: 2022/3/13
 * @createTime: 12:40 PM
 */

// LeetCode-283
function moveZeroes1(&$nums)
{
    $notZeroArr = [];
    for ($i = 0, $num = count($nums); $i < $num; $i++) {
        if ($nums[$i])
            $notZeroArr[] = $nums[$i];
    }
    for ($i = 0, $num = count($notZeroArr); $i < $num; $i++) {
        $nums[$i] = $notZeroArr[$i];
    }
    for ($i = count($notZeroArr), $num = count($nums); $i < $num; $i++) {
        $nums[$i] = 0;
    }
}

function moveZeroes2(&$nums)
{
    $k = 0;
    for ($i = 0, $num = count($nums); $i < $num; $i++) {
        if ($nums[$i]) {
            $nums[$k] = $nums[$i];
            $k++;
        }
    }
    for ($i = $k, $num = count($nums); $i < $num; $i++) {
        $nums[$i] = 0;
    }
}