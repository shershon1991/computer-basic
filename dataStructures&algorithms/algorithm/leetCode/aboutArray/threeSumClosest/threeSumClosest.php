<?php
/**
 * @date: 2022/4/22
 * @createTime: 11:55 AM
 */

// leetcode-16
// 最接近的三数之和
// 时间复杂度: O(N^2) 空间复杂度: O(1)
function threeSumClosest($nums, $target)
{
    sort($nums);
    $len = count($nums);
    $ret = 2 ** 30;
    for ($i = 0; $i < $len; $i++) {
        list($l, $r) = [$i + 1, $len - 1];
        while ($l < $r) {
            $tmp = $nums[$i] + $nums[$l] + $nums[$r];
            if(abs($ret - $target) > abs($tmp - $target)) $ret = $tmp;
            //如果temp小于target，说明right减下去只会让temp更小，更远离target，此时移动left
            if($tmp <= $target)
                $l++;
            else
                $r--;
        }
    }
    return $ret;
}