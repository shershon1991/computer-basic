<?php
/**
 * @date: 2022/3/14
 * @createTime: 2:39 PM
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

// LeetCode-437
class Solution
{
    function pathSum($root, $targetSum)
    {
        if (!isset($root))
            return 0;

        $res = $this->findPath($root, $targetSum);
        $res += $this->pathSum($root->left, $targetSum);
        $res += $this->pathSum($root->right, $targetSum);

        return $res;
    }

    function findPath($node, $num)
    {
        if (!isset($node))
            return 0;

        $res = 0;
        if ($node->val == $num)
            $res += 1;

        $res += $this->findPath($node->left, $num - $node->val);
        $res += $this->findPath($node->right, $num - $node->val);

        return $res;
    }
}