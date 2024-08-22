<?php
/**
 * Created by PhpStorm.
 * User: Shershon
 * Date: 2019/8/29
 * Time: 14:48
 */

// leetcode-14
// 最长公共前缀
// 时间复杂度：O(N * len(strs(0)) 空间复杂度：O(N)
function longestCommonPrefix($strs)
{
    if (count($strs) == 0) {
        return "";
    }
    $dp = [];
    for ($i = 0; $i < count($strs); $i++) {
        $dp[$i] = $strs[0];
    }
    for ($i = 1; $i < count($strs); $i++) {
        while (substr($strs[$i], 0, strlen($dp[$i - 1])) !== $dp[$i - 1]) {
            $dp[$i - 1] = substr($dp[$i - 1], 0, strlen($dp[$i - 1]) - 1);
        }
        $dp[$i] = $dp[$i - 1];
    }
    return $dp[count($dp) - 1];
}

// 时间复杂度: O(N * len(strs(0)) 空间复杂度: O(1)
function longestCommonPrefix2($strs)
{
    if (count($strs) == 0) {
        return "";
    }
    for ($i = 0; $i < strlen($strs[0]); $i++) {
        foreach ($strs as $v) {
            if (strlen($v) <= $i || $strs[0][$i] != $v[$i]) {
                return substr($strs[0], 0, $i);
            }
        }
    }
    return $strs[0];
}

$strs = ["c", "acc", "ccc"];
$rst1 = longestCommonPrefix($strs);
$rst2 = longestCommonPrefix2($strs);
var_dump($rst1);
var_dump($rst2);