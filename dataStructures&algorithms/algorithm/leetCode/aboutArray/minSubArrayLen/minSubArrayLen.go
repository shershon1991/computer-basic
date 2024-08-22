/**
 * @Author: shershon
 * @Description:
 * @Date: 2022/03/13 12:28 PM
 */

package main

import "math"

// Leetcode-209
// 思想：滑动窗口
func minSubArrayLen(target int, nums []int) int {
	l := 0
	r := -1
	sum := 0
	count := len(nums)
	res := count + 1

	for l < count {
		if r+1 < count && sum < target {
			sum += nums[r+1]
			r++
		} else {
			sum -= nums[l]
			l++
		}
		if sum >= target {
			res = int(math.Min(float64(res), float64(r-l+1)))
		}
	}

	if res == count+1 {
		return 0
	}
	return res
}
