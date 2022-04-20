<?php
/**
 * @date: 2022/4/19
 * @createTime: 11:49 AM
 */

// leetcode-5
// 最长回文子串
// 时间复杂度: O(N^2) 空间复杂度: O(N^2)
function longestPalindrome($s)
{
    $dp = [];
    $res = "";
    $len = strlen($s);
    for ($i = $len; $i >= 0; $i--) {
        for ($j = $i; $j < $len; $j++) {
            // 如果s[i]和s[j]相等，并且要么i和j之间只有一个字符，要么中间的子串也是回文子串，此时我们的dp[i][j]就是True了
            $dp[$i][$j] = ($s[$i] == $s[$j]) && ($j - $i < 3 || $dp[$i + 1][$j - 1]);
            if ($dp[$i][$j] && $j - $i + 1 > strlen($res)) { // 此时的回文子串长度大于res
                $res = substr($s, $i, $j - $i + 1);
            }
        }
    }
    return $res;
}