/**
 * @Author: shershon
 * @Description:
 * @Date: 2022/03/13 2:33 PM
 */

package main

// Leetcode-167
func twoSum(numbers []int, target int) []int {
	left := 1
	right := len(numbers)
	res := make([]int, 0)

	for left < right {
		if numbers[left-1]+numbers[right-1] == target {
			res = append(res, left, right)
			break
		} else if numbers[left-1]+numbers[right-1] > target {
			right--
		} else {
			left++
		}
	}
	return res
}
