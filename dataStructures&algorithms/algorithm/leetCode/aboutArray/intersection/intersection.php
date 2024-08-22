<?php
/**
 * @date: 2022/3/14
 * @createTime: 11:06 AM
 */

// Leetcode-349
// 暴力解法
function intersection1($nums1, $nums2)
{
    $res = [];
    $nums1 = array_values(array_unique($nums1));
    $nums2 = array_values(array_unique($nums2));

    for ($i = 0, $m = count($nums1); $i < $m; $i++) {
        for ($j = 0, $n = count($nums2); $j < $n; $j++) {
            if ($nums1[$i] == $nums2[$j]) {
                $res[] = $nums1[$i];
            }
        }
    }
    return $res;
}

function intersection2($nums1, $nums2)
{
    $res = [];
    $nums1 = array_values(array_unique($nums1));
    for ($i = 0, $m = count($nums1); $i < $m; $i++) {
        if (in_array($nums1[$i], $nums2)) {
            $res[] = $nums1[$i];
        }
    }
    return $res;
}