<?php
/**
 * Created by PhpStorm.
 * User: Shershon
 * Date: 2019/8/28
 * Time: 9:25
 */

// 求两数之和
// 方法1：时间复杂度O(n^2) 空间复杂度O(1)
function twoSum($arr, $target)
{
    $num = count($arr);
    // 第一轮遍历
    for ($i = 0; $i < $num; $i++) {
        // 第二轮遍历，不能重复
        for ($j = $i + 1; $j < $num; $j++) {
            if ($arr[$i] + $arr[$j] == $target) {
                return [$i, $j];
            }
        }
    }
    return [];
}

// 方法2：时间复杂度O(n) 空间复杂度O(n)
function twoSum2($arr, $target)
{
    $lookup = [];
    foreach ($arr as $j => $num) {
        if (isset($lookup[$target - $num])) {
            return [$lookup[$target - $num], $j];
        }
        $lookup[$num] = $j; // 每一轮都存放当前num和其index到map中
    }
    return [];
}

$arr = [1, 3, 5, 12, 56, 72, 88, 23];
$target = 89;
$rst = twoSum($arr, $target);
print_r($rst);

$arr = [1, 3, 5, 12, 56, 72, 88, 23];
$target = 89;
$rst = twoSum2($arr, $target);
print_r($rst);
