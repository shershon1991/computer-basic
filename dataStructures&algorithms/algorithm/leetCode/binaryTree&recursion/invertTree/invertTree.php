<?php
/**
 * @date: 2022/3/14
 * @createTime: 2:33 PM
 */

// Definition for a binary tree node.
class TreeNode
{
    public $val = null;
    public $left = null;
    public $right = null;

    function __construct($val = 0, $left = null, $right = null)
    {
        $this->val = $val;
        $this->left = $left;
        $this->right = $right;
    }
}

// Leetcode-226
class Solution
{
    function invertTree($root)
    {
        if (!isset($root)) {
            return null;
        }

        $this->invertTree($root->left);
        $this->invertTree($root->right);

        $tmp = $root->left;
        $root->left = $root->right;
        $root->right = $tmp;

        return $root;
    }
}