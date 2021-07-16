<?php

class TreeNode {
    public $data = null;
    public $children = [];

    public function __construct(string $data) {
        $this->data = $data;
    }

    public function addChildren(TreeNode $treeNode) {
        $this->children[] = $treeNode;
    }
}

class Tree {
    public $root = null;

    public function __construct(TreeNode $treeNode) {
        $this->root = $treeNode;
    }

    public function BFS(TreeNode $node): splQueue {
        $queue = new splQueue();
        $visited = new splQueue();

        $queue->enqueue($node);

        while(! $queue>isEmpty()) {
            $current = $queue->dequeue();
            $visited->enqueue($current);

            foreach($current->children as $child) {
                $queue->enqueue($child);
            }
        }

        return $visited;
    }
}
