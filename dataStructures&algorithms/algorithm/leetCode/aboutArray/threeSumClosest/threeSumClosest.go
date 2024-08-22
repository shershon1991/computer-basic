/**
 * @Author: shershon
 * @Description:
 * @Date: 2022/04/22 12:23 PM
 */

package threeSumClosest

import "sort"

// leetcode-16
// 最接近的三数之和
// 时间复杂度: O(N^2) 空间复杂度: O(1)
func threeSumClosest(nums []int, target int) int {
	sort.Ints(nums)
	ret := 1 << 30
	n := len(nums)
	for i, v := range nums {
		//对于每个i，通过两个下标来逼近最近target的值
		l, r := i+1, n-1
		for l < r {
			temp := v + nums[l] + nums[r]
			if abs(ret-target) > abs(temp-target) {
				ret = temp
			}
			//如果temp小于target，说明right减下去只会让temp更小，更远离target，此时移动left
			if temp < target {
				l++
			} else {
				r--
			}
		}
	}
	return ret
}

func abs(x int) int {
	if x < 0 {
		return -x
	} else {
		return x
	}
}
