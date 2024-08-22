/**
 * @Author: shershon
 * @Description:
 * @Date: 2022/04/29 11:42 AM
 */

package wiggleSortII

import "sort"

// 摆动排序
// 时间复杂度: O(NlgN) 空间复杂度: O(N)
func wiggleSort(nums []int) {
	temp := make([]int, len(nums))
	copy(temp, nums)
	sort.Ints(temp)
	k := len(temp) - 1
	for i := 1; i < len(nums); i += 2 {
		nums[i] = temp[k]
		k--
	}
	for i := 0; i < len(nums); i += 2 {
		nums[i] = temp[k]
		k--
	}
}

// 时间复杂度: O(N) 空间复杂度: O(1)
func wiggleSort2(nums []int) {
	for i := 0; i < len(nums)-1; i++ {
		if ((i&1) == 0 && nums[i] > nums[i+1]) || ((i&1) == 1 && nums[i] < nums[i+1]) {
			temp := nums[i]
			nums[i] = nums[i+1]
			nums[i+1] = temp
		}
	}
}

// leetcode-280 wiggleSort/wiggleSort2两种方法都满足
// leetcode-324 wiggleSort满足
