/**
 * @Author: shershon
 * @Description:
 * @Date: 2022/04/14 11:50 AM
 */

package longestCommonPrefix

import "strings"

// leetcode-14
// 最长公共前缀
// 时间复杂度：O(N * len(strs(0)) 空间复杂度：O(N)
func longestCommonPrefix(strs []string) string {
	if len(strs) == 0 {
		return ""
	}
	dp := make([]string, len(strs))
	for i := 0; i < len(strs); i++ {
		dp[i] = strs[0]
	}
	for i := 1; i < len(strs); i++ {
		for !strings.HasPrefix(strs[i], dp[i-1]) {
			dp[i-1] = dp[i-1][:len(dp[i-1])-1]
		}
		dp[i] = dp[i-1]
	}
	return dp[len(dp)-1]
}

// 时间复杂度: O(N * len(strs(0)) 空间复杂度: O(1)
func longestCommonPrefix2(strs []string) string {
	if len(strs) == 0 {
		return ""
	}
	for i := 0; i < len(strs[0]); i++ {
		for _, str := range strs {
			// 只要strs中存在比当前长度i更短的string，立刻返回上一轮LCP，即strs[0][:i]
			// 只要strs中存在当前index字符与LCP该index不相同的字符串，立刻返回上一轮LCP，即strs[0][:i]
			if len(str) <= i || strs[0][i] != str[i] {
				return strs[0][:i]
			}
		}
	}
	return strs[0] // 如果一直没返回，说明strs[0]本身就是LCP，返回它
}
