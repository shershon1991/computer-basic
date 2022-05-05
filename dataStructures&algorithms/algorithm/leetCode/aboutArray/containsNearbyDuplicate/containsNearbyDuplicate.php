<?php
/**
 * @date: 2022/3/14
 * @createTime: 11:00 AM
 */

// Leetcode-219
function containsNearbyDuplicate($nums, $k)
{
    $n = count($nums);
    $record = [];
    for ($i = 0; $i < $n; $i++) {
        if (in_array($nums[$i], $record)) {
            return true;
        }

        $record[] = $nums[$i];

        if (count($record) == $k + 1) {
            unset($record[$i - $k]);
        }
    }

    return false;
}