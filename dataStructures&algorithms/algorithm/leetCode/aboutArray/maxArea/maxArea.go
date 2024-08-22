/**
 * @Author: shershon
 * @Description:
 * @Date: 2022/04/26 11:33 AM
 */

package maxArea

import "math"

// leetcode-11
// 盛最多水的容器
// 时间复杂度: O(N^2) 空间复杂度: O(1)
func maxArea(height []int) int {
	count := len(height)
	if count < 2 {
		return 0
	}
	res := 0
	for i := 0; i < count-1; i++ {
		for j := i + 1; j < count; j++ {
			area := (j - i) * int(math.Min(float64(height[i]), float64(height[j])))
			/*if area > res {
				res = area
			}*/
			res = int(math.Max(float64(res), float64(area)))
		}
	}
	return res
}

// 时间复杂度: O(N) 空间复杂度: O(1)
func maxArea2(height []int) int {
	count := len(height)
	if count < 2 {
		return 0
	}
	res := 0
	l, r := 0, count-1
	for l < r {
		area := (r - l) * int(math.Min(float64(height[l]), float64(height[r])))
		/*if area > res {
			res = area
		}*/
		res = int(math.Max(float64(res), float64(area)))
		if height[l] < height[r] {
			l++
		} else if height[l] > height[r] {
			r--
		} else {
			l++
			r--
		}
	}
	return res
}
