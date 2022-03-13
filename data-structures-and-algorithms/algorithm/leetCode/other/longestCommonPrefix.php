<?php
/**
 * Created by PhpStorm.
 * User: Shershon
 * Date: 2019/8/29
 * Time: 14:48
 */

// 最长公共前缀

// 时间复杂度：O(N * len(strs(0)) 空间复杂度：O(N)
function longestCommonPrefix($strArr)
{
    if (count($strArr) == 0) {
        return "";
    }
    $dp = [];
    for ($i = 0; $i < count($strArr); $i++) {
        $dp[$i] = $strArr[0];
    }
    //var_dump($dp);
    for ($i = 1; $i < count($strArr); $i++) {
        while (strpos($strArr[$i], $dp[$i - 1]) === false) {
            $dp[$i - 1] = substr($dp[$i - 1], 0, strlen($dp[$i - 1]) - 1);
        }
        $dp[$i] = $dp[$i - 1];
    }
    return $dp[count($dp) - 1];
}

// 时间复杂度: O(N * len(strs(0)) 空间复杂度: O(1)
function longestCommonPrefix2($strArr)
{
    if (count($strArr) == 0) {
        return "";
    }
    for ($i = 0; $i < strlen($strArr[0]); $i++) {
        foreach ($strArr as $k => $v) {
            if (strlen($v) <= $i || $strArr[0][$i] != $v[$i]) {
                return substr($strArr[0], 0, $i);
            }
        }
    }
    return $strArr[0];
}

$strArr = ["abdoop", "abcdmvc", "abcfifo"];
$rst = longestCommonPrefix2($strArr);
echo $rst;