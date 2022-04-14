<?php
/**
 * @date: 2022/3/13
 * @createTime: 8:54 PM
 */

// Definition for a singly-linked list.
class ListNode
{
    public $val = 0;
    public $next = null;

    function __construct($val = 0, $next = null)
    {
        $this->val = $val;
        $this->next = $next;
    }
}

// Leetcode-206
class Solution
{
    function ReverseList($head)
    {
        $pre = null;
        $cur = $head;

        while ($cur != null) {
            $next = $cur->next;
            $cur->next = $pre;
            $pre = $cur;
            $cur = $next;
        }
        return $pre;
    }
}

// 头插法创建一个链表
$linkList = new ListNode();
for ($i = 5; $i >= 1; $i--) {
    $node = new ListNode($i, $linkList->next);
    $linkList->next = $node;
}
print_r($linkList);
// 反转后
print_r((new Solution())->ReverseList($linkList));