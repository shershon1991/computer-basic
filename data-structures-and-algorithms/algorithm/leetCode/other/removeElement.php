<?php
/**
 * Created by PhpStorm.
 * User: shershon
 * Date: 2019/10/19
 * Time: 21:54
 */

// 移除数组中的指定元素

// 时间复杂度：O(N^2) 空间复杂度：O(1)
function removeElement($arr, $val)
{
    $len = count($arr);

    while (1) {
        $find = false;
        for ($i = 0; $i < $len; $i++) {
            if ($arr[$i] == $val) {
                array_splice($arr, $i, 1);
                $len = count($arr);
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
function removeElement2($arr, $val)
{
    $ret = 0;
    for ($i = 0, $len = count($arr); $i < $len; $i++) {
        if ($arr[$i] != $val) {
            $arr[$ret] = $arr[$i];
            $ret++;
        }
    }
    return $ret;
}

$arr = [1, 2, 3, 3, 4, 4, 5];
$res = removeElement2($arr, 3);
echo $res;