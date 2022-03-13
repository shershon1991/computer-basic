<?php
/**
 * @date: 2022/3/13
 * @createTime: 8:49 PM
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

// Leetcode-203
class Solution
{
    function removeElements1($head, $val)
    {
        $dummyNode = new ListNode();
        $dummyNode->next = $head;

        $cur = $dummyNode;
        while (isset($cur->next)) {
            if ($cur->next->val == $val) {
                $delNode = $cur->next;
                $cur->next = $delNode->next;
                unset($delNode);
            } else {
                $cur = $cur->next;
            }
        }

        $retNode = $dummyNode->next;
        unset($dummyNode);

        return $retNode;
    }

    function removeElements2($head, $val)
    {
        while (isset($head) && $head->val == $val) {
            $delNode = $head;
            $head = $head->next;
            unset($delNode);
        }

        if (!isset($head)) {
            return null;
        }

        $cur = $head;
        while (isset($cur->next)) {
            if ($cur->next->val == $val) {
                $delNode = $cur->next;
                $cur->next = $delNode->next;
                unset($delNode);
            } else {
                $cur = $cur->next;
            }
        }

        return $head;
    }
}
