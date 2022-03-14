<?php
/**
 * @date: 2022/3/14
 * @createTime: 1:14 PM
 */

// Leetcode-20
function isValid($s)
{
    $stack = [];
    for ($i = 0; $i < strlen($s); $i++) {
        if ($s[$i] == '(' || $s[$i] == '[' || $s[$i] == '{') {
            array_push($stack, $s[$i]);
        } else {
            if (count($stack) == 0)
                return false;

            $top = array_pop($stack);

            if ($s[$i] == ')') {
                $match = '(';
            } elseif ($s[$i] == ']') {
                $match = '[';
            } else {
                $match = '{';
            }

            if ($top != $match)
                return false;
        }
    }

    if (count($stack) != 0)
        return false;

    return true;
}