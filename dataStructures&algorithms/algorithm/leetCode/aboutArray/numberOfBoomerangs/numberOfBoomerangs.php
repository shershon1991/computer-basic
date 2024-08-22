<?php
/**
 * @date: 2022/3/14
 * @createTime: 11:24 AM
 */

// Leetcode-447
class Solution
{
    function numberOfBoomerangs($points)
    {
        $res = 0;
        $nums = count($points);
        for ($i = 0; $i < $nums; $i++) {
            $record = [];
            for ($j = 0; $j < $nums; $j++) {
                if ($j != $i) {
                    $record[$this->dis($points[$i], $points[$j])]++;
                }
            }
            foreach ($record as $value) {
                if ($value >= 2) {
                    $res += $value * ($value - 1);
                }
            }
        }
        return $res;
    }

    function dis(array $pa, array $pb)
    {
        return ($pa[0] - $pb[0]) * ($pa[0] - $pb[0]) + ($pa[1] - $pb[1]) * ($pa[1] - $pb[1]);
    }
}