<?php
/**
 * Created by PhpStorm.
 * User: Shershon
 * Date: 2019/8/29
 * Time: 14:48
 */

// leetcode-20
// 有效的括号
// 时间复杂度：O(N^2) 空间复杂度：O(N)
function isValid($str)
{
    while (1) {
        $len = strlen($str);
        $str = str_replace("()", "", $str);
        $str = str_replace("[]", "", $str);
        $str = str_replace("{}", "", $str);
        if (strlen($str) == $len) {
            break;
        }
    }
    return strlen($str) == 0;
}

// 时间复杂度: O(N) 空间复杂度: O(N)
function isValid2($str)
{
    $stack = [];
    $n = 0;

    for ($i = 0, $len = strlen($str); $i < $len; $i++) {
        $currChar = $str[$i];
        if ($currChar == '(' || $currChar == '[' || $currChar == '{') {
            $stack[$n] = $currChar;
            $n++;
        } else if ($currChar == ')') {
            if ($n == 0 || $stack[$n - 1] != '(') {
                return false;
            }
            $n--;
        } else if ($currChar == ']') {
            if ($n == 0 || $stack[$n - 1] != '[') {
                return false;
            }
            $n--;
        } else if ($currChar == '}') {
            if ($n == 0 || $stack[$n - 1] != '{') {
                return false;
            }
            $n--;
        }
    }
    if ($n == 0) {
        return true;
    } else {
        return false;
    }
}

$str = "(]";
$rst = isValid2($str);
var_dump($rst);