<?php

class TreeNode
{
    public $data = null;
    public $children = [];

    public function __construct(string $data)
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

    public function __construct(TreeNode $treeNode)
    {
        $this->root = $treeNode;
    }

    public function BFS(TreeNode $node): splQueue
    {
        $queue = new splQueue();
        $visited = new splQueue();

        $queue->enqueue($node);

        while (!$queue->isEmpty()) {
            $current = $queue->dequeue();
            $visited->enqueue($current);

            foreach ($current->children as $child) {
                $queue->enqueue($child);
            }
        }

        return $visited;
    }
}

// 广度优先搜索
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
var_dump($tree->BFS($root));
