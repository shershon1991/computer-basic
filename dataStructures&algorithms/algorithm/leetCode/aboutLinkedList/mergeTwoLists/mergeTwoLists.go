/**
 * @Author: shershon
 * @Description:
 * @Date: 2022/04/15 11:15 AM
 */

package mergeTwoLists

// ListNode Definition for singly-linked list.
type ListNode struct {
	Val  int
	Next *ListNode
}

// leetcode-21
// 时间复杂度: O(N) 空间复杂度: O(1)
func mergeTwoLists(list1 *ListNode, list2 *ListNode) *ListNode {
	dummy := new(ListNode)
	cur := dummy
	// 遍历两个链表，每次比较链表头的大小，每次让较小值添加到 dummy 的后面，并且让较小值所在的链表后移一位
	for {
		if list1 == nil && list2 == nil {
			break
		}
		if list1 == nil {
			cur.Next = list2
			break
		}
		if list2 == nil {
			cur.Next = list1
			break
		}
		// 会出现一条链表遍历完，另外一条链表没遍历完的情况，需要将没遍历完的链表添加到结果链表中
		if list1.Val < list2.Val {
			cur.Next = list1
			list1 = list1.Next
			cur = cur.Next
		} else {
			cur.Next = list2
			list2 = list2.Next
			cur = cur.Next
		}
	}
	return dummy.Next
}
