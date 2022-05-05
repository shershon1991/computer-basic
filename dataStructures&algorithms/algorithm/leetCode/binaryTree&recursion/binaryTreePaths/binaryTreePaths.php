<?php
/**
 * @date: 2022/3/14
 * @createTime: 2:31 PM
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

// LeetCode-257
class Solution
{
    function binaryTreePaths($root)
    {
        $res = [];

        if (!isset($root))
            return $res;

        if (!isset($root->left) && !isset($root->right)) {
            array_push($res, (string)$root->val);
            return $res;
        }

        $left = $this->binaryTreePaths($root->left);
        for ($i = 0; $i < count($left); $i++) {
            array_push($res, (string)$root->val . '->' . $left[$i]);
        }

        $right = $this->binaryTreePaths($root->right);
        for ($i = 0; $i < count($right); $i++) {
            array_push($res, (string)$root->val . '->' . $right[$i]);
        }

        return $res;
    }
}