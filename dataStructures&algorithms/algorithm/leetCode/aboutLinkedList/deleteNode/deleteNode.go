/**
 * @Author: shershon
 * @Description:
 * @Date: 2022/03/13 7:46 PM
 */

package main

// DelNode Definition for singly-linked list.
type DelNode struct {
	Val  int
	Next *DelNode
}

// Leetcode-237
func deleteNode(node *DelNode) {
	if node == nil {
		return
	}
	if node.Next == nil {
		node = nil
		return
	}
	node.Val = node.Next.Val
	delNode := node.Next
	node.Next = delNode.Next

	return
}
