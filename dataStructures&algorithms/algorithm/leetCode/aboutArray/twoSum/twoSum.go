/**
 * @Author: shershon
 * @Description:
 * @Date: 2022/04/12 10:38 AM
 */

package twoSum

// Leetcode-1
// 暴力解法
// 时间复杂度:O(N^2) 空间复杂度:O(1)
func twoSum1(nums []int, target int) []int {
	for i := 0; i < len(nums)-1; i++ {
		for j := i + 1; j < len(nums); j++ {
			if nums[i]+nums[j] == target {
				return []int{i, j}
			}
		}
	}
	return []int{}
}

// 时间复杂度: O(N) 空间复杂度: O(N)
func twoSum2(nums []int, target int) []int {
	lookup := map[int]int{}
	for j, num := range nums {
		if i, ok := lookup[target-num]; ok {
			return []int{i, j}
		}
		lookup[num] = j
	}
	return []int{}
}
