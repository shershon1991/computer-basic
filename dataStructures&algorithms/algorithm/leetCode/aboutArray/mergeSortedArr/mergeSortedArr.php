<?php
/**
 * @date: 2022/6/1
 * @createTime: 8:05 PM
 */

// leetcode-88
function mergeSortedArr($arr1, $arr2)
{
    $len1 = count($arr1);
    $len2 = count($arr2);
    $i = $j = 0;
    $res = [];
    while(1) {
        if($i == $len1) {
            array_push($res, ...array_slice($arr2, $j));
            break;
        }
        if($j == $len2) {
            array_push($res, ...array_slice($arr1, $i));
            break;
        }
        if($arr1[$i] < $arr2[$j]) {
            $res[] = $arr1[$i];
            $i++;
        } else {
            $res[] = $arr2[$j];
            $j++;
        }
    }
    return $res;
}

$arr1 = [1,2,3];
$arr2 = [2,5,6];
print_r(mergeSortedArr($arr1, $arr2));