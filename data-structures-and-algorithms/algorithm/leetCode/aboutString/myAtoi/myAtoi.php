<?php
/**
 * @date: 2022/4/20
 * @createTime: 12:01 PM
 */

const INT_MAX = 2147483647;
const INT_MIN = -2147483648;

// leetcode-8
// 字符串转换整数 (atoi)
// 时间复杂度: O(N) 空间复杂度: O(1)
function myAtoi($s)
{
    if (empty($s)) return 0;
    $s = trim($s);
    $negativeflag = false;
    $res = '';
    if (preg_match('/[+-]/', $s[0])) {
        if ($s[0] == '-') {
            $negativeflag = true;
        }
        $s = substr($s, 1);
    }
    if (!preg_match('/[0-9]/i', $s[0])) {
        return 0;
    }
    for ($i = 0, $len = strlen($s); $i < $len; $i++) {
        if (preg_match('/[a-z]/i', $s[$i])) {
            break;
        } else {
            $res .= $s[$i];
        }
    }
    if ($negativeflag) {
        $res = -intval($res);
    } else {
        $res = intval($res);
    }
    if ($res > pow(2, 31) - 1) {
        $res = INT_MAX;
    } else if ($res < -2 ** 31) {
        $res = INT_MIN;
    }
    return $res;
}

$s = '-91283472332';
var_dump(myAtoi($s));