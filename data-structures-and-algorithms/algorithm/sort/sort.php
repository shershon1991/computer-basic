<?php

// 选择排序
function selectSort($arr) {
    $len = count($arr);

    for($i = 0 ; $i < $len - 1; $i ++) {
        // 默认第一个是最小值
        $min = $i;
        // 注意这里是从$i + 1 开始遍历剩余的元素，选出最小值
        for($n = $i + 1 ; $n < $len; $n ++) {
            if($arr[$n] < $arr[$min]) {
                $min = $n;
            }
        }
        // 如果最小值不是当前默认的最小值，那么进行替换
        if($min != $i) {
            $t = $arr[$i];
            $arr[$i] = $arr[$min];
            $arr[$min] = $t;
        }
    }

    return $arr;
}

// 冒泡排序
function bubbleSort($arr) {
    $len = count($arr);
    // 这里比较N次
    for($i = 0; $i< $len - 1; $i++) {
        // 每次比较实际上都要-$i，因为每次比较结束后最后一个值就不用参与下次比较了
        for($n = 0; $n < $len - 1 - $i; $n ++) {
            if($arr[$n] > $arr[$n + 1]) {
                $t = $arr[$n];
                $arr[$n] = $arr[$n + 1];
                $arr[$n + 1] = $t;
            }
        }
    }

    return $arr;

}

// 快速排序
function quickSort($arr) {
    $len = count($arr);

    // 因为是递归，所以如果最后的数组可能是空的也可能是1个，那么就没有可比较的了，直接返回
    if($len <= 1) {
        return $arr;
    }

    $base = $min = $max = [];

    $base_item = $arr[0];

    for($i = 0; $i < $len; $i++) {
        if($arr[$i] < $base_item) {
            $min[] = $arr[$i];
        } elseif($arr[$i] > $base_item) {
            $max[] = $arr[$i];
        } else {
            $base[] = $arr[$i];
        }
    }

    $min = quickSort($min);
    $max = quickSort($max);

    // 每次构造新的序列
    return array_merge($min, $base, $max);
}
