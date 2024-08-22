/**
 * @Author: shershon
 * @Description:
 * @Date: 2022/03/13 11:27 AM
 */

package main

import (
	"math"
	"strings"
)

// Leetcode-3
// 思想：滑动窗口
// 时间复杂度: O(N) 空间复杂度: O(N)
func lengthOfLongestSubstring(s string) int {
	var res float64
	slice := strings.Split(s, "")
	freq := map[string]int{}
	l := 0
	r := -1

	for l < len(s) {
		if r+1 < len(s) && freq[slice[r+1]] == 0 {
			freq[slice[r+1]]++
			r++
		} else {
			freq[slice[l]]--
			l++
		}
		res = math.Max(res, float64(r-l+1))
	}
	return int(res)
}

// 时间复杂度: O(N) 空间复杂度: O(N)
func lengthOfLongestSubstring2(s string) int {
	l, r, counter, res := 0, 0, 0, 0 // counter 为当前子串中 unique 字符的数量
	lookup := map[byte]int{}
	for r < len(s) {
		_, ok := lookup[s[r]]
		if !ok {
			lookup[s[r]] = 1
		} else {
			lookup[s[r]] += 1
		}
		if lookup[s[r]] == 1 { // 遇到了当前子串中未出现过的字符
			counter += 1
		}
		r += 1
		// counter < r - l 说明有重复字符出现，否则 counter 应该等于 r - l
		for l < r && counter < r-l {
			lookup[s[l]] -= 1
			if lookup[s[l]] == 0 { // 当前子串中的一种字符完全消失了
				counter -= 1
			}
			l += 1
		}
		res = int(math.Max(float64(res), float64(r-l))) // 当前子串满足条件了，更新最大长度
	}
	return res
}

// 时间复杂度: O(N) 空间复杂度: O(N)
func lengthOfLongestSubstring3(s string) int {
	res, start := 0, 0 // start 指针指向的是当前子串首字符在 input 中对应的index
	lookup := map[byte]int{}

	for i, _ := range s {
		idx, ok := lookup[s[i]]
		if !ok {
			start = int(math.Max(float64(start), float64(-1+1))) // 找到当前子串新的起点
		} else {
			start = int(math.Max(float64(start), float64(idx+1))) // 找到当前子串新的起点
		}
		res = int(math.Max(float64(res), float64(i-start+1))) // 当前子串满足条件了，更新结果
		lookup[s[i]] = i                                      // 将当前字符与其在 input 中的 index 记录下来
	}
	return res
}
