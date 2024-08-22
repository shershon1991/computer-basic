<?php
/**
 * Created by PhpStorm.
 * User: Shershon
 * Date: 2019/8/29
 * Time: 14:48
 */

// leetcode-80
// 删除排序数组中的重复项II
// 时间复杂度O(N)，空间复杂度O(1)
function removeDuplicates($nums)
{
    $idx = 0;
    foreach ($nums as $v) {
        if ($idx < 2 || $v != $nums[$idx - 2]) {
            $nums[$idx] = $v;
            $idx += 1;
        }
    }
    return $idx;
}

