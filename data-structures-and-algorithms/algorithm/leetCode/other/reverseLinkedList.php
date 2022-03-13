<?php

// 用PHP模拟反转一个链表
class Node
{
    public $data;
    public $next;
}

// 头插法创建一个连表
$linkList = new Node();
$linkList->next = null; // 头结点

for ($i = 5; $i >= 1; $i--) {
    $node = new Node();
    $node->data = "a{$i}";
    $node->next = $linkList->next;
    $linkList->next = $node;
}
print_r($linkList);

function ReverseList($head)
{
    $pre = null;
    $cur = $head;

    while ($cur != null) {
        $next = $cur->next;
        $cur->next = $pre;
        $pre = $cur;
        $cur = $next;
    }
    return $pre;
}

print_r(ReverseList($linkList));