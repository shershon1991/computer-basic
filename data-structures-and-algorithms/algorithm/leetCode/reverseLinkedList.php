<?php

// 用PHP模拟反转一个链表
class Node {
    public $data;
    public $next;
}

// 头插法创建一个连表
$linkList = new Node();
$linkList->next = null; // 头结点

for($i = 1; $i <= 10; $i++) {
    $node = new Node();
    $node->data = "aaa{$i}";
    $node->next = $linkList->next;
    $linkList->next = $node;
}
var_dump($linkList);

function ReverseList($pHead) {
    $old = $pHead->next;
    $new = $tmp = null;

    while($old != null) {
        $tmp = $old->next;
        $old->next = $new;
        $new = $old;
        $old = $tmp;
    }

    $newHead = new Node();
    $newHead->next = $new;
    var_dump($newHead);
}
ReverseList($linkList);