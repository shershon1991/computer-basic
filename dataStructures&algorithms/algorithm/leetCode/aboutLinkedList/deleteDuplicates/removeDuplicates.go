/**
 * @Author: shershon
 * @Description:
 * @Date: 2022/04/15 12:12 PM
 */

package removeDuplicates

// ListNode Definition for singly-linked list.
type ListNode struct {
	Val  int
	Next *ListNode
}

func deleteDuplicates(head *ListNode) *ListNode {
	dummy := head
	for head != nil {
		for head.Next != nil && head.Next.Val == head.Val {
			head.Next = head.Next.Next // 删掉重复元素
		}
		head = head.Next // 当前元素没重复，进行下一次判断
	}
	return dummy
}
