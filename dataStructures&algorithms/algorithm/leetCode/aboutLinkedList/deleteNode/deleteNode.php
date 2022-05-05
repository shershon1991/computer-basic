<?php
/**
 * @date: 2022/3/13
 * @createTime: 7:38 PM
 */

// Definition for singly-linked list.
class ListNode
{
    public $val = 0;
    public $next = null;

    function __construct($val)
    {
        $this->val = $val;
    }
}

// Leetcode-237
class Solution
{
    function deleteNode(ListNode $node)
    {
        if (!isset($node)) {
            return;
        }
        if (!isset($node->next)) {
            unset($node);
            return;
        }
        $node->val = $node->next->val;
        $delNode = $node->next;
        $node->next = $delNode->next;
        unset($delNode);
    }
}
