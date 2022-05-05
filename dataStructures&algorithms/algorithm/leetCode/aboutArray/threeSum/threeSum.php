<?php
/**
 * @date: 2022/4/21
 * @createTime: 11:45 AM
 */

// leetcode-15
// 三数之和
// 时间复杂度: O(N^3) 空间复杂度: O(N)
function threeSum($nums)
{
    sort($nums);
    $len = count($nums);
    $res = [];
    for ($i = 0; $i < $len; $i++) {
        for ($j = $i + 1; $j < $len; $j++) {
            for ($k = $j + 1; $k < $len; $k++) {
                if ($nums[$i] + $nums[$j] + $nums[$k] == 0) {
                    $tmp = [$nums[$i], $nums[$j], $nums[$k]];
                    if (!in_array($tmp, $res)) $res[] = $tmp;
                }
            }
        }
    }
    return $res;
}

// 时间复杂度: O(N^2) 空间复杂度: O(N)
function threeSum2($nums)
{
    sort($nums);
    $len = count($nums);
    $res = [];
    for ($i = 0; $i < $len; $i++) {
        if ($i > 0 && $nums[$i] == $nums[$i - 1]) continue; // i=0的时候我们需要直接往下执行
        list($l, $r) = [$i + 1, $len - 1];
        while ($l < $r) {
            $tmp = $nums[$i] + $nums[$l] + $nums[$r];
            if ($tmp == 0) { // 如果三个数字加起来是0的话
                $res[] = [$nums[$i], $nums[$l], $nums[$r]];
                $l++;
                $r--;
                while($l < $r && $nums[$l] == $nums[$l - 1]) { // 重复数字我们不需要考虑
                    $l++;
                }
                while($l < $r && $nums[$r] == $nums[$r + 1]) { // 重复数字我们不需要考虑
                    $r--;
                }
            } elseif ($tmp > 0) { // 说明我们需要一个更小的数字
                $r--;
            } else { // 说明我们需要一个更大的数字
                $l++;
            }
        }
    }
    return $res;
}

$arr = [-1, 0, 1, 2, -1, -4];
var_dump(threeSum2($arr));