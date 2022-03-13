<?php
/**
 * @date: 2022/3/13
 * @createTime: 12:04 AM
 */

// Leetcode-3
// 思想：滑动窗口
function lengthOfLongestSubstring($s)
{
    $lens = strlen($s);//总的字符串有多长
    $tmp = '';       //用于存储子串  当前里面不会有重复的字符
    $len = 0;        //最长子串的长度
    for ($i = 0; $i < $lens; $i++) {
        $re = strpos($tmp, $s[$i]);//判断 是否有重复的
        if (false !== $re) {//有重复
            $tmp .= $s[$i];//先追加上去 例如pww
            $tmp = substr($tmp, $re + 1);//从重复位置开始 截取后 pww=>w
        } else {//无重复字符
            $tmp .= $s[$i];//追加到后面
        }
        //每一次过去后，比较当前的tmp 与上一次的 len 谁更大
        $len = strlen($tmp) > $len ? strlen($tmp) : $len;
    }
    return $len;//最后返回的长度 不一定是$tmp
}