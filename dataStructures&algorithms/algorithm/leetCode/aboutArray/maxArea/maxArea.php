<?php
/**
 * @date: 2022/4/26
 * @createTime: 10:59 AM
 */

// leetcode-11
// 盛最多水的容器
// 时间复杂度: O(N^2) 空间复杂度: O(1)
function maxArea($height)
{
    $len = count($height);
    if($len < 2) return 0;
    $res = 0;
    for ($i = 0; $i < $len - 1; $i++) {
        for ($j = $i + 1; $j < $len; $j++) {
            $area = ($j - $i) * min($height[$i], $height[$j]);
            if($area > $res) $res = $area;
        }
    }
    return $res;
}

// 时间复杂度: O(N) 空间复杂度: O(1)
function maxArea2($height)
{
    $len = count($height);
    if($len < 2) return 0;
    list($l, $r) = [0, $len - 1];
    $res = 0;
    while($l < $r) {
        $area = ($r - $l) * min($height[$l], $height[$r]);
        if($area > $res) $res = $area;
        if($height[$l] < $height[$r]) {
            $l++;
        } elseif ($height[$l] > $height[$r]) {
            $r--;
        } else {
            $l++;
            $r--;
        }
    }
    return $res;
}