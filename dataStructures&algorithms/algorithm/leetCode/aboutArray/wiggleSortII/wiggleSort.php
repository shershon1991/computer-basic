<?php
/**
 * @date: 2022/4/29
 * @createTime: 12:23 PM
 */

// 摆动排序
// 时间复杂度: O(NlgN) 空间复杂度: O(N)
function wiggleSort(&$nums)
{
    $temp = $nums;
    sort($temp);
    $k = count($temp) - 1;
    for ($i = 1; $i < count($nums); $i += 2) {
        $nums[$i] = $temp[$k];
        $k--;
    }
    for ($i = 0; $i < count($nums); $i += 2) {
        $nums[$i] = $temp[$k];
        $k--;
    }
}

// 时间复杂度: O(N) 空间复杂度: O(1)
function wiggleSort2(&$nums)
{
    for ($i = 0; $i < count($nums); $i++) {
        if ((($i & 1) == 0 && $nums[$i] > $nums[$i + 1]) || (($i & 1) == 1 && $nums[$i] < $nums[$i + 1])) {
            $temp = $nums[$i];
            $nums[$i] = $nums[$i + 1];
            $nums[$i + 1] = $temp;
        }
    }
}

// leetcode-280 wiggleSort/wiggleSort2两种方法都满足
// leetcode-324 wiggleSort满足