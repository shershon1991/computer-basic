<?php
/**
 * Created by PhpStorm.
 * User: shershon
 * Date: 2019/10/19
 * Time: 21:54
 */

// leetcode-27
// 移除数组中的指定元素
// 时间复杂度：O(N^2) 空间复杂度：O(1)
function removeElement($nums, $val)
{
    $len = count($nums);

    while (1) {
        $find = false;
        for ($i = 0; $i < $len; $i++) {
            if ($nums[$i] == $val) {
                array_splice($nums, $i, 1);
                $len = count($nums);
                $find = true;
                break;
            }
        }
        if (!$find) {
            break;
        }
    }

    return $len;
}

// 时间复杂度：O(N) 空间复杂度：O(1)
function removeElement2($nums, $val)
{
    $ret = 0;
    for ($i = 0, $len = count($nums); $i < $len; $i++) {
        if ($nums[$i] != $val) {
            $nums[$ret] = $nums[$i];
            $ret++;
        }
    }
    return $ret;
}

$nums = [1, 2, 3, 3, 4, 4, 5];
$res = removeElement2($nums, 3);
echo $res;