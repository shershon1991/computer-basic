/**
 * @Author: shershon
 * @Description:
 * @Date: 2022/04/25 10:24 AM
 */

package removeNthFromEnd

// ListNode Definition for singly-linked list.
type ListNode struct {
	Val  int
	Next *ListNode
}

// Leetcode-19
// 删除链表的倒数第 N 个结点
// 时间复杂度: O(N) 空间复杂度: O(1)
func removeNthFromEnd(head *ListNode, n int) *ListNode {
	dummy := &ListNode{-1, head}
	a := dummy
	b := dummy
	for i := 0; i < n; i++ {
		a = a.Next
	}
	for a.Next != nil {
		a = a.Next
		b = b.Next
	}
	b.Next = b.Next.Next
	return dummy.Next
}

// 时间复杂度: O(N) 空间复杂度: O(1)
func removeNthFromEnd2(head *ListNode, n int) *ListNode { //cnt是链表的长度
	cnt := 0
	tmp := head
	for tmp != nil {
		cnt++
		tmp = tmp.Next
	}
	//算出从后数n个从前数第几个
	cnt = cnt - n
	if cnt == 0 {
		return head.Next
	} else {
		tmp = head
		cnt--
		for cnt > 0 {
			cnt--
			tmp = tmp.Next
		}
		tmp.Next = tmp.Next.Next
		return head
	}
}

// 时间复杂度: O(N) 空间复杂度: O(1)
func removeNthFromEnd3(head *ListNode, n int) *ListNode {
	dummy := &ListNode{-1, head}
	a := dummy
	b := dummy
	count := 0
	for a.Next != nil {
		if count < n {
			a = a.Next
		} else {
			a = a.Next
			b = b.Next
		}
		count++
	}
	b.Next = b.Next.Next
	return dummy.Next
}
