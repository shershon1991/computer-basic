/**
 * @Author: shershon
 * @Description:
 * @Date: 2022/03/13 11:27 AM
 */

package main

import (
	"math"
	"strconv"
)

// Leetcode-3
// 思想：滑动窗口
func lengthOfLongestSubstring(s string) int {
	freq := map[string]int{}
	l := 0
	r := -1
	var res float64

	for l < len(s) {
		if r+1 < len(s) && freq[strconv.Itoa(int(s[r+1]))] == 0 {
			r++
			freq[strconv.Itoa(int(s[r]))]++
		} else {
			freq[strconv.Itoa(int(s[l]))]--
			l++
		}
		res = math.Max(res, float64(r-l+1))
	}

	return int(res)
}
