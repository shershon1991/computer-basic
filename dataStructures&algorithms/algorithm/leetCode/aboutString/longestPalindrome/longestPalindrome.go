/**
 * @Author: shershon
 * @Description:
 * @Date: 2022/04/19 10:52 AM
 */

package main

import "math"

// leetcode-5
// 最长回文子串
// 时间复杂度: O(N^2) 空间复杂度: O(N^2)
func longestPalindrome(s string) string {
	dp := make([][]bool, len(s))
	for i := 0; i < len(s); i++ {
		dp[i] = make([]bool, len(s))
	}
	res := ""
	for i := len(s) - 1; i >= 0; i-- {
		for j := i; j < len(s); j++ {
			// 如果s[i]和s[j]相等，并且要么i和j之间只有一个字符，要么中间的子串也是回文子串，此时我们的dp[i][j]就是True了
			dp[i][j] = (s[i] == s[j]) && (j-i < 3 || dp[i+1][j-1])
			if dp[i][j] && j-i+1 > len(res) { // 此时的回文子串长度大于res
				res = s[i : j+1]
			}
		}
	}
	return res
}

// 时间复杂度: O(N^2) 空间复杂度: O(1)
func longestPalindrome2(s string) string {
	// 当s=""时，此时l,r = 0,0，golang不支持rindex大于底层array的长度
	// 所以我们要提前处理
	if s == "" {
		return ""
	}
	// l: left index of the current substring
	// r: right index of the current substring
	// maxLen: length of the longest palindromic substring for now
	l, r, maxLen, n := 0, 0, 0, len(s)
	for i := 0; i < len(s); i++ {
		// odd case: 'xxx s[i] xxx', such as 'abcdcba'
		for j := 0; j < int(math.Min(float64(i+1), float64(n-i))); j++ { // 向左最多移动 i 位，向右最多移动 (n-1-i) 位
			if s[i-j] != s[i+j] { // 不对称了就不用继续往下判断了
				break
			}
			if 2*j+1 > maxLen { // 如果当前子串长度大于目前最长长度
				maxLen = 2*j + 1
				l = i - j
				r = i + j
			}
		}
		// even case: 'xxx s[i] s[i+1] xxx', such as 'abcddcba'
		if i+1 < n && s[i] == s[i+1] {
			// s[i]向左最多移动 i 位，s[i+1]向右最多移动 [n-1-(i+1)] 位
			for j := 0; j < int(math.Min(float64(i+1), float64(n-i-1))); j++ {
				if s[i-j] != s[i+1+j] { // 不对称了就不用继续往下判断了
					break
				}
				if 2*j+2 > maxLen {
					maxLen = 2*j + 2
					l = i - j
					r = i + 1 + j
				}
			}
		}
	}
	return s[l : r+1]
}

func main() {
	s := "babad"
	_ = longestPalindrome(s)
}
