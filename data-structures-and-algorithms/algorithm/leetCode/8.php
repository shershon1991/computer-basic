<?php
/**
 * Created by PhpStorm.
 * User: Shershon
 * Date: 2019/8/29
 * Time: 14:48
 */

// 删除排序数组中的重复项

// 时间复杂度O(N^2)，空间复杂度O(1)
function removeDuplicates($arr) {
    $idx = 0;
    while($idx < count($arr)-1) {
        if($arr[$idx] == $arr[$idx + 1]) {
            unset($arr[$idx]);
        } else {
            $idx += 1;
        }
    }
    return count($arr);
}
// 优化，时间复杂度O(N)，空间复杂度O(1)
function removeDuplicates2($arr) {
    $idx = 0;
    foreach($arr as $v) {
        if($idx < 1 || $v != $arr[$idx-1]) {
            $arr[$idx] = $v;
            $idx += 1;
        }
    }
    return $idx;
}
/*$arr = [1,1,2,2,3,4];
$rst = removeDuplicates2($arr);
var_dump($rst);*/


// 从排序链表中移除重复元素
function deleteDuplicates($arr) {
    foreach($arr as $k=>$v) {
        if(isset($v) && $v == $arr[$k+1]) {
            unset($arr[$k+1]);
        }
    }
    return $arr;
}
$arr = [1,1,2,2,3,4];
$rst = deleteDuplicates($arr);
var_dump($rst);

