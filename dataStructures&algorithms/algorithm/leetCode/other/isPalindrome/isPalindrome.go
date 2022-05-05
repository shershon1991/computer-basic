/**
 * @Author: shershon
 * @Description:
 * @Date: 2022/04/13 2:32 PM
 */

package isPalindrome

import "strconv"

// leetcode-9
// 方法1：时间复杂度: O(N) 空间复杂度: O(N)
func isPalindrome(x int) bool {
	if x < 0 {
		return false
	}
	xStr := strconv.Itoa(x)
	xStrReverse := make([]rune, 0)
	for i := range xStr {
		xStrReverse = append(xStrReverse, rune(xStr[len(xStr)-1-i]))
	}
	for i := 0; i < len(xStr); i++ {
		if rune(xStr[i]) != xStrReverse[i] {
			return false
		}
	}
	return true
}

// 方法2：时间复杂度: O(1) 空间复杂度: O(1)
func isPalindrome2(x int) bool {
	// 负数肯定不是palindrome
	// 如果一个数字是一个正数，并且能被10整除，那它肯定也不是palindrome，因为首位肯定不是 0
	if x < 0 || (x > 0 && x%10 == 0) {
		return false
	}

	res, y := 0, x
	for x > 0 {
		res = res*10 + x%10
		x /= 10
	}
	return y == res
}
