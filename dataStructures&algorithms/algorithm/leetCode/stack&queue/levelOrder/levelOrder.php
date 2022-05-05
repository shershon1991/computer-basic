<?php
/**
 * @date: 2022/3/14
 * @createTime: 1:23 PM
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
    // 迭代版本1：数组模拟队列（先入先出）
    function levelOrder1($root)
    {
        $res = $arr = [];
        if ($root == null) {
            return $res;
        }
        array_push($arr, $root);
        $level = 0;
        while ($count = count($arr)) {
            for ($i = $count; $i > 0; $i--) {
                $node = array_shift($arr);
                $res[$level][] = $node->val;
                if ($node->left != null) array_push($arr, $node->left);
                if ($node->right != null) array_push($arr, $node->right);
            }
            $level++;
        }
        return $res;
    }

    // 迭代版本2：使用php SplQueue
    function levelOrder2($root)
    {
        $res = [];
        $arr = new SplQueue();
        if ($root == null) {
            return $res;
        }
        $arr->enqueue($root);
        $level = 0;
        while ($count = $arr->count()) {
            for ($i = $count; $i > 0; $i--) {
                $node = $arr->dequeue();
                $res[$level][] = $node->val;
                if ($node->left != null) $arr->enqueue($node->left);
                if ($node->right != null) $arr->enqueue($node->right);
            }
            $level++;
        }
        return $res;
    }

    // 递归版本
    function levelOrder3($root)
    {
        $res = [];
        $this->level($root, 0, $res);
        return $res;
    }

    function level($root, $level, &$res)
    {
        if ($root == null) {
            return null;
        }
        $res[$level][] = $root->val;
        $level++;
        if ($root->left != null) {
            $this->level($root->left, $level, $res);
        }
        if ($root->right != null) {
            $this->level($root->right, $level, $res);
        }
    }
}

$node15 = new TreeNode((15));
$node7 = new TreeNode((7));
$node9 = new TreeNode((9));
$node20 = new TreeNode(20, $node15, $node7);
$root = new TreeNode(3, $node9, $node20);
$obj = new climbStairs();
print_r($obj->levelOrder1());