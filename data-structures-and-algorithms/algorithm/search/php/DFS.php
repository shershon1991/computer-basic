<?php

class TreeNode
{
    public $data = null;
    public $children = [];

    public function __construct(string $data = '')
    {
        $this->data = $data;
    }

    public function addChildren(TreeNode $treeNode)
    {
        $this->children[] = $treeNode;
    }
}

class Tree
{
    public $root = null;
    public $visited = null;

    public function __construct(TreeNode $treeNode)
    {
        $this->root = $treeNode;
        $this->visited = new splQueue();
    }

    // 递归方法
    public function DFS(TreeNode $node): splQueue
    {
        $this->visited->enqueue($node);

        if ($node->children) {
            foreach ($node->children as $child) {
                $this->DFS($child);
            }
        }

        return $this->visited;
    }

    // 迭代方法
    public function DFSIterator(TreeNode $node): splQueue
    {
        $stack = new splStack();
        $visited = new splQueue();

        $stack->push($node);

        while (!$stack->isEmpty()) {
            $current = $stack->pop();
            $visited->enqueue($current);

            foreach ($current->children as $child) {
                $stack->push($child);
            }
        }

        return $visited;
    }
}

// 深度优先搜索
$root = new TreeNode('8');
$node4 = new TreeNode('4');
$node7 = new TreeNode('7');
$node6 = new TreeNode('6');
$node6->addChildren($node4);
$node6->addChildren($node7);
$node1 = new TreeNode('1');
$node3 = new TreeNode('3');
$node3->addChildren($node1);
$node3->addChildren($node6);
$node13 = new TreeNode('13');
$node14 = new TreeNode('14');
$node14->addChildren($node13);
$node10 = new TreeNode('10');
$node10->addChildren($node14);
$root->addChildren($node3);
$root->addChildren($node10);

$tree = new Tree($root);
var_dump($tree->DFSIterator($root));
var_dump($tree->DFS($root));
