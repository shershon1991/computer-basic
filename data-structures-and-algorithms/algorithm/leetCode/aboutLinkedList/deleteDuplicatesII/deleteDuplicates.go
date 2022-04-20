/**
 * @Author: shershon
 * @Description:
 * @Date: 2022/04/15 12:36 PM
 */

package deleteDuplicatesII

import "math"

// ListNode Definition for singly-linked list.
type ListNode struct {
	Val  int
	Next *ListNode
}

func deleteDuplicates(head *ListNode) *ListNode {
	dummy := &ListNode{Val: math.MaxInt32 + 1} // 这里是为了不与后面的元素重复
	prev, cur := dummy, dummy
	for head != nil {
		// 如果当前是元素是重复元素
		for head != nil && ((head.Val == prev.Val) || (head.Next != nil && head.Next.Val == head.Val)) {
			prev = head
			head = head.Next // 不停跳过重复元素
		}
		cur.Next = head // cur永远指向我们的不重复元素
		cur = cur.Next
		if head != nil { // head也要往后走，但是注意head可能已经走到None了，因此要判断一下
			head = head.Next
		}
	}
	return dummy.Next
}
