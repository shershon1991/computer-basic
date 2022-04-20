/**
 * @Author: shershon
 * @Description:
 * @Date: 2022/04/16 3:19 PM
 */

package addTwoNumbers

import (
	"math/big"
	"strconv"
)

// ListNode Definition for singly-linked list.
type ListNode struct {
	Val  int
	Next *ListNode
}

// leetcode-2
// 两数相加
// 时间复杂度: O(N) 空间复杂度: O(N)
func addTwoNumbers(l1 *ListNode, l2 *ListNode) *ListNode {
	// 获得 l1 和 l2 的 字符串表示, 因为题目说了l1和l2均非空，这里可以直接取val不会有问题
	num1Str := strconv.Itoa(l1.Val)
	for l1.Next != nil {
		num1Str += strconv.Itoa(l1.Next.Val)
		l1 = l1.Next
	}
	num2Str := strconv.Itoa(l2.Val)
	for l2.Next != nil {
		num2Str += strconv.Itoa(l2.Next.Val)
		l2 = l2.Next
	}
	// 反转两个字符串，因为我们的链表是逆序的
	num1Str = reverse(num1Str)
	num2Str = reverse(num2Str)
	// 求出 l1 代表的数字，注意这里可能会有大数溢出
	num1 := new(big.Int)
	num1, _ = num1.SetString(num1Str, 10)
	// 求出 l2 代表的数字，注意这里可能会有大数溢出
	num2 := new(big.Int)
	num2, _ = num2.SetString(num2Str, 10)
	// 得到 l1 和 l2 相加之和, 注意这里可能会有大数溢出
	sums := new(big.Int)
	sums = sums.Add(sums, num1)
	sums = sums.Add(sums, num2)
	sumsStr := sums.String()
	sumsRune := make([]rune, 0)
	for i, _ := range sumsStr {
		sumsRune = append(sumsRune, rune(sumsStr[len(sumsStr)-1-i]))
	}
	// 将 sums 转成题目中 linkedlist 所对应的表示形式
	dummy := &ListNode{Val: 0}
	head := dummy
	for _, digit := range sumsRune {
		head.Next = &ListNode{Val: int(digit - '0')}
		head = head.Next
	}
	// dummy.Next 作为返回结果
	return dummy.Next
}

func reverse(s string) string {
	runes := []rune(s)
	for i, j := 0, len(runes)-1; i < j; i, j = i+1, j-1 {
		runes[i], runes[j] = runes[j], runes[i]
	}
	return string(runes)
}

// 时间复杂度: O(N) 空间复杂度: O(N)
func addTwoNumbers2(l1 *ListNode, l2 *ListNode) *ListNode {
	// 因为处理到最后的时候，可能输入的 l1 和 l2 都不是一个 ListNode 而是 nil 了
	if l1 == nil && l2 == nil {
		return nil
	} else if l1 == nil || l2 == nil { // l1 和 l2 其中一个是 nil
		if l1 == nil {
			return l2
		}
		if l2 == nil {
			return l1
		}
	} else {
		if l1.Val+l2.Val < 10 { // 个位数相加没有进位
			l3 := ListNode{Val: l1.Val + l2.Val}
			l3.Next = addTwoNumbers2(l1.Next, l2.Next)
			return &l3
		} else {
			l3 := ListNode{Val: l1.Val + l2.Val - 10}
			// 递归调用，记得加上进位
			l3.Next = addTwoNumbers2(l1.Next, addTwoNumbers2(l2.Next, &ListNode{Val: 1}))
			return &l3
		}
	}
	return nil
}

// 时间复杂度: O(N) 空间复杂度: O(1)
func addTwoNumbers3(l1 *ListNode, l2 *ListNode) *ListNode {
	var head, tail *ListNode
	var one bool
	for l1 != nil || l2 != nil {
		val := 0
		if l1 != nil {
			val += l1.Val
			l1 = l1.Next
		}
		if l2 != nil {
			val += l2.Val
			l2 = l2.Next
		}
		if one {
			val += 1
		}
		if val >= 10 {
			val -= 10
			one = true
		} else {
			one = false
		}
		if head == nil {
			head = &ListNode{Val: val}
			tail = head
		} else {
			tail.Next = &ListNode{Val: val}
			tail = tail.Next
		}
	}
	if one {
		tail.Next = &ListNode{Val: 1}
	}
	return head
}
