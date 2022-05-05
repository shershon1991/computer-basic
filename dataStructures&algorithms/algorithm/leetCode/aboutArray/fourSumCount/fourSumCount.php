<?php
/**
 * @date: 2022/3/14
 * @createTime: 10:33 AM
 */

// Leetcode-454
function fourSumCount($nums1, $nums2, $nums3, $nums4)
{
    $numsFreq = [];
    for ($i = 0, $m = count($nums1); $i < $m; $i++) {
        for ($j = 0, $n = count($nums2); $j < $n; $j++) {
            $numsFreq[$nums1[$i] + $nums2[$j]]++;
        }
    }

    $res = 0;
    for ($i = 0, $m = count($nums3); $i < $m; $i++) {
        for ($j = 0, $n = count($nums4); $j < $n; $j++) {
            $complement = 0 - $nums3[$i] - $nums4[$j];
            if (in_array($complement, array_keys($numsFreq))) {
                $res += $numsFreq[$complement];
            }
        }
    }

    return $res;
}
