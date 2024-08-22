<?php
/**
 * Created by PhpStorm.
 * User: Shershon
 * Date: 2019/8/29
 * Time: 14:48
 */

// leetcode-12
// 整数转罗马数字
// 时间复杂度：O(n) 空间复杂度：O(1)
function intToRoman($num)
{
    // 初始化了一个一一对应的map，方便后面取出符号
    $lookupSymbol = ["M", "CM", "D", "CD", "C", "XC", "L", "XL", "X", "IX", "V", "IV", "I"];
    $lookupNum = [1000, 900, 500, 400, 100, 90, 50, 40, 10, 9, 5, 4, 1];
    $roman = "";
    foreach ($lookupSymbol as $k => $v) {
        $val = $lookupNum[$k];
        while ($num >= $val) {
            $roman .= $lookupSymbol[$k];
            $num -= $val;
        }
    }
    return $roman;
}

// leetcode-13
// 罗马数字转整数
// 时间复杂度：O(n) 空间复杂度：O(1)
function romanToInt($s)
{
    $lookup["I"] = 1;
    $lookup["V"] = 5;
    $lookup["X"] = 10;
    $lookup["L"] = 50;
    $lookup["C"] = 100;
    $lookup["D"] = 500;
    $lookup["M"] = 1000;

    $res = 0;
    for ($i = 0; $i < strlen($s); $i++) {
        if ($i > 0 && $lookup[$s[$i]] > $lookup[$s[$i - 1]]) {
            $res += $lookup[$s[$i]] - 2 * $lookup[$s[$i - 1]];
        } else {
            $res += $lookup[$s[$i]];
        }
    }
    return $res;
}

$num = 3968;
$rst = intToRoman($num);
echo $rst . PHP_EOL;

$s = "MMMCMLXVIII";
$rst2 = romanToInt($s);
echo $rst2 . PHP_EOL;