<?php
/**
 * Created by PhpStorm.
 * User: Shershon
 * Date: 2019/8/28
 * Time: 13:47
 */

// 回文数
// 法1：时间复杂度: O(N) 空间复杂度: O(N)
function isPalindrome($num) {
    if($num < 0) {
        return false;
    }
    $numStr = (string)$num;
    $numStrReverse = strrev($numStr);
    if($numStr === $numStrReverse) {
        return true;
    }
    return false;
}

// 法2：时间复杂度: O(N) 空间复杂度: O(1)
function isPalindrome2($num) {
    if($num < 0 || ($num != 0 && $num % 10 == 0)) {
        return false;
    }
    $tmp = $num;
    $res = 0;
    while($num) {
        $res = $res * 10 + $num % 10;
        $num = floor($num / 10);
    }
    return $tmp === $res;
}

$num = 12321;
$rst = isPalindrome($num);
var_dump($rst);

$num2 = 12321;
$rst2 = isPalindrome2($num2);
var_dump($rst2);