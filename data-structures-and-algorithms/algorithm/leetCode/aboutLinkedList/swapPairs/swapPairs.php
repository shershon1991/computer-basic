<?php
/**
 * @date: 2022/3/13
 * @createTime: 9:24 PM
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

// Leetcode-24
class Solution
{
    function swapPairs($head)
    {
        $dummyNode = new ListNode();
        $dummyNode->next = $head;

        $p = $dummyNode;
        while ($p->next && $p->next->next) {
            $node1 = $p->next;
            $node2 = $node1->next;
            $next = $node2->next;

            $node2->next = $node1;
            $node1->next = $next;
            $p->next = $node2;

            $p = $node1;
        }

        $retNode = $dummyNode->next;
        return $retNode;
    }
}