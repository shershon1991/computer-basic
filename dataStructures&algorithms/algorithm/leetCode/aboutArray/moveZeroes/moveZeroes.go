/**
 * @Author: shershon
 * @Description:
 * @Date: 2022/03/13 12:52 PM
 */

package main

// LeetCode-283
func moveZeroes1(nums []int) {
	notZeroArr := make([]int, 0)
	var i int
	count1 := len(nums)
	for i = 0; i < count1; i++ {
		if nums[i] != 0 {
			notZeroArr = append(notZeroArr, nums[i])
		}
	}
	count2 := len(notZeroArr)
	for i = 0; i < count2; i++ {
		nums[i] = notZeroArr[i]
	}
	for i = count2; i < count1; i++ {
		nums[i] = 0
	}
}

func moveZeroes2(nums []int) {
	k := 0
	var i int
	count := len(nums)
	for i = 0; i < count; i++ {
		if nums[i] != 0 {
			nums[k] = nums[i]
			k++
		}
	}
	for i = k; i < count; i++ {
		nums[i] = 0
	}
}
