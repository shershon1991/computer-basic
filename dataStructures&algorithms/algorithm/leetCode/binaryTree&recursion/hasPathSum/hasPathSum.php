<?php
/**
 * @date: 2022/3/14
 * @createTime: 2:37 PM
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

class Solution
{
    function hasPathSum($root, $targetSum)
    {
        if (!isset($root))
            return false;

        if (!isset($root->left) && !isset($root->right))
            return $root->val == $targetSum;

        if ($this->hasPathSum($root->left, $targetSum - $root->val))
            return true;

        if ($this->hasPathSum($root->right, $targetSum - $root->val))
            return true;

        return false;
    }
}