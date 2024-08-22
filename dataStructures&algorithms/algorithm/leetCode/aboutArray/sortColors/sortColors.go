/**
 * @Author: shershon
 * @Description:
 * @Date: 2022/03/13 2:18 PM
 */

package main

// Leetcode-75
func sortColors(nums []int) {
	freq := make(map[int]int)
	count := len(nums)
	var i int

	for i = 0; i < count; i++ {
		freq[nums[i]]++
	}

	index := 0
	for i = 0; i < freq[0]; i++ {
		nums[index] = 0
		index++
	}
	for i = 0; i < freq[1]; i++ {
		nums[index] = 1
		index++
	}
	for i = 0; i < freq[2]; i++ {
		nums[index] = 2
		index++
	}
}
