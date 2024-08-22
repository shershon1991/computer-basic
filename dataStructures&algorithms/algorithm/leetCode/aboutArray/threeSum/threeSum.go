/**
 * @Author: shershon
 * @Description:
 * @Date: 2022/04/21 12:14 PM
 */

package threeSum

import "sort"

// leetcode-15
// 三数之和
// 时间复杂度: O(N^3) 空间复杂度: O(N)
func threeSum(nums []int) [][]int {
	n := len(nums)
	res := make([][]int, 0)
	sort.Ints(nums)
	for i := 0; i < n; i += 1 {
		for j := i + 1; j < n; j += 1 {
			for k := j + 1; k < n; k += 1 {
				if nums[i]+nums[j]+nums[k] == 0 { // 如果三个数字加起来是0的话
					curRes := []int{nums[i], nums[j], nums[k]}
					var flag bool
					for _, r := range res {
						if r[0] == curRes[0] && r[1] == curRes[1] && r[2] == curRes[2] {
							flag = true
							break
						}
					}
					if !flag { // 如果res当中不存在当前这种组合的话我们就把它放进去
						res = append(res, curRes)
					}
				}
			}
		}
	}
	return res
}

// 时间复杂度: O(N^2) 空间复杂度: O(N)
func threeSum2(nums []int) [][]int {
	n := len(nums)
	res := make([][]int, 0)
	sort.Ints(nums)
	for i := 0; i < n; i += 1 {
		if i > 0 && nums[i] == nums[i-1] { // i=0的时候我们需要直接往下执行
			continue
		}
		l, r := i+1, n-1
		for l < r {
			tmp := nums[i] + nums[l] + nums[r]
			if tmp == 0 { // 如果三个数字加起来是0的话
				res = append(res, []int{nums[i], nums[l], nums[r]})
				l++
				r--
				for l < r && nums[l] == nums[l-1] { // 重复数字我们不需要考虑
					l++
				}
				for l < r && nums[r] == nums[r+1] { // 重复数字我们不需要考虑
					r--
				}
			} else if tmp > 0 { // 说明我们需要一个更小的数字
				r--
			} else { // 说明我们需要一个更大的数字
				l++
			}
		}
	}
	return res
}
