<?php
/**
 * @date: 2022/3/13
 * @createTime: 2:14 PM
 */

// Leetcode-75
function sortColors(&$nums)
{
    $count = [0, 0, 0];

    for ($i = 0, $n = count($nums); $i < $n; $i++)
        $count[$nums[$i]]++;

    $index = 0;
    for ($i = 0; $i < $count[0]; $i++)
        $nums[$index++] = 0;
    for ($i = 0; $i < $count[1]; $i++)
        $nums[$index++] = 1;
    for ($i = 0; $i < $count[2]; $i++)
        $nums[$index++] = 2;
}