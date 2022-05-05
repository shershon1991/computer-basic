/**
 * @Author: shershon
 * @Description:
 * @Date: 2022/04/25 11:55 AM
 */

package swapPairs

// ListNode Definition for singly-linked list.
type ListNode struct {
	Val  int
	Next *ListNode
}

// leetcode-24
// 两两交换链表中的节点
// 时间复杂度: O(N) 空间复杂度: O(N)
func swapPairs(head *ListNode) *ListNode {
	// 链表长度小于2，我们都直接返回head就行
	if head == nil || head.Next == nil {
		return head
	}
	next := head.Next
	// 递归处理后面所有的节点
	head.Next = swapPairs(next.Next)
	// 交换前两个节点
	next.Next = head
	return next
}

// 时间复杂度: O(N) 空间复杂度: O(1)
func swapPairs2(head *ListNode) *ListNode {
	dummy := &ListNode{-1, nil}
	dummy.Next = head
	p := dummy
	for {
		//迭代所有节点
		if p.Next == nil || p.Next.Next == nil {
			break
		}
		first := p.Next
		second := first.Next
		//交换前两个节点
		first.Next = second.Next
		second.Next = first
		p.Next = second
		p = p.Next.Next
	}
	return dummy.Next
}
