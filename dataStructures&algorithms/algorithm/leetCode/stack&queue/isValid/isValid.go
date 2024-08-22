/**
 * @Author: shershon
 * @Description:
 * @Date: 2022/04/15 10:22 AM
 */

package isValid

import "strings"

// leetcode-20
// 有效的括号
// 时间复杂度：O(N^2) 空间复杂度：O(N)
func isValid(s string) bool {
	for {
		l := len(s)
		s = strings.Replace(s, "()", "", -1)
		s = strings.Replace(s, "[]", "", -1)
		s = strings.Replace(s, "{}", "", -1)
		//判断s是否没变过，相当于s不存在(),[],{}
		if len(s) == l {
			break
		}
	}
	return len(s) == 0
}

// 时间复杂度: O(N) 空间复杂度: O(N)
func isValid2(s string) bool {
	stack := make([]rune, len(s))
	n := 0
	for _, c := range s {
		if c == '(' || c == '[' || c == '{' {
			stack[n] = c
			n++
		} else if c == ')' {
			if n == 0 || stack[n-1] != '(' {
				return false
			}
			n--
		} else if c == ']' {
			if n == 0 || stack[n-1] != '[' {
				return false
			}
			n--
		} else if c == '}' {
			if n == 0 || stack[n-1] != '{' {
				return false
			}
			n--
		}
	}
	if n == 0 {
		return true
	} else {
		return false
	}
}
