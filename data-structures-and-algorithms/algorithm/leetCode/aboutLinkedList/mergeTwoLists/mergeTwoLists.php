<?php
/**
 * @date: 2022/4/15
 * @createTime: 11:25 AM
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

// leetcode-21
// 时间复杂度: O(N) 空间复杂度: O(1)
class Solution
{
    function mergeTwoLists($list1, $list2)
    {
        $dummy = new ListNode();
        $cur = $dummy;
        // 遍历两个链表，每次比较链表头的大小，每次让较小值添加到 dummy 的后面，并且让较小值所在的链表后移一位
        while(1) {
            if($list1 == null && $list2 == null)
                break;
            if($list1 == null) {
                $cur->next = $list2;
                break;
            }
            if($list2 == null) {
                $cur->next = $list1;
                break;
            }
            // 会出现一条链表遍历完，另外一条链表没遍历完的情况，需要将没遍历的链表添加到结果链表中
            if($list1->val < $list2->val) {
                $cur->next = $list1;
                $list1 = $list1->next;
            } else {
                $cur->next = $list2;
                $list2 = $list2->next;
            }
            $cur = $cur->next;
        }
        return $dummy->next;
    }
}