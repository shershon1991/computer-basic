<?php
/**
 * @date: 2022/3/14
 * @createTime: 11:19 AM
 */

// Leetcode-350
function intersect($nums1, $nums2)
{
    $res = [];
    $numsFreq1 = $numsFreq2 = [];

    for ($i = 0, $m = count($nums1); $i < $m; $i++) {
        $numsFreq1[$nums1[$i]]++;
    }

    for ($i = 0, $m = count($nums2); $i < $m; $i++) {
        $numsFreq2[$nums2[$i]]++;
    }

    $nums1 = array_values(array_unique($nums1));
    for ($i = 0, $m = count($nums1); $i < $m; $i++) {
        if (in_array($nums1[$i], $nums2)) {
            $min = min($numsFreq1[$nums1[$i]], $numsFreq2[$nums1[$i]]);
            for ($j = 0; $j < $min; $j++) {
                $res[] = $nums1[$i];
            }
        }
    }

    return $res;
}