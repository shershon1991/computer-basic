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

// Leetcode-237
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

        while ($q != NULL) {
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
}