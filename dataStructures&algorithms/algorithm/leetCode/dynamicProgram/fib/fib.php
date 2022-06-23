<?php
/**
 * @date: 2022/6/23
 * @createTime: 09:39
 */

// Leetcode-509
// 递归
function fib1($n)
{
    if ($n <= 2) {
        return 1;
    }
    return fib1($n - 2) + fib1($n - 1);
}

// 记忆化搜索（自上向下的解决问题）：递归过程中将函数的调用缓存起来，叫做记忆化搜索
function fib2($n)
{
    $staticVal = -1;
    $keys = range(0, $n);
    $memo = array_fill_keys($keys, $staticVal);
    if ($n <= 2) {
        return 1;
    }

    if ($memo[$n] != -1) {
        return $memo[$n];
    }

    return fib2($n - 2) + fib2($n - 1);
}

// 动态规划（自下向上的解决问题）
function fib3($n)
{
    $staticVal = -1;
    $keys = range(0, $n);
    $memo = array_fill_keys($keys, $staticVal);
    $memo[1] = $memo[2] = 1;
    for ($i = 3; $i <= $n; $i++) {
        $memo[$i] = $memo[$i - 2] + $memo[$i - 1];
    }
    return $memo[$n];
}