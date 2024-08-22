<?php
/**
 * @date: 2022/3/13
 * @createTime: 8:01 PM
 */

//Definition for a singly-linked list.
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

// Leetcode-19
// 删除链表的倒数第 N 个结点
// 时间复杂度: O(N) 空间复杂度: O(1)
class Solution
{
    function removeNthFromEnd($head, $n)
    {
        $dummyNode = new ListNode(0);
        $dummyNode->next = $head;
        $p = $dummyNode;
        $q = $dummyNode;
        for ($i = 0; $i < $n + 1; $i++) {
            $q = $q->next;
        }
        while ($q != null) {
            $p = $p->next;
            $q = $q->next;
        }
        $delNode = $p->next;
        $p->next = $delNode->next;
        unset($delNode);
        $retNode = $dummyNode->next;
        unset($dummyNode);
        return $retNode;
    }

    // 时间复杂度: O(N) 空间复杂度: O(1)
    function removeNthFromEnd2($head, $n)
    {
        $cnt = 0;
        $tmp = $head;
        while ($tmp != null) {
            $cnt++;
            $tmp = $tmp->next;
        }
        $cnt = $cnt - $n;
        if ($cnt == 0) {
            return $head->next;
        } else {
            $tmp = $head;
            $cnt--;
            while ($cnt > 0) {
                $cnt--;
                $tmp = $tmp->next;
            }
            $tmp->next = $tmp->next->next;
            return $head;
        }
    }

    // 时间复杂度: O(N) 空间复杂度: O(1)
    function removeNthFromEnd3($head, $n)
    {
        $dummyNode = new ListNode(0);
        $dummyNode->next = $head;
        $p = $dummyNode;
        $q = $dummyNode;
        $count = 0;
        while ($q->next != null) {
            if ($count < $n)
                $q = $q->next;
            else {
                $p = $p->next;
                $q = $q->next;
            }
            $count++;
        }
        $delNode = $p->next;
        $p->next = $delNode->next;
        unset($delNode);
        $retNode = $dummyNode->next;
        unset($dummyNode);
        return $retNode;
    }
}