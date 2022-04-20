/**
 * @Author: shershon
 * @Description:
 * @Date: 2022/04/15 12:51 PM
 */

package removeElement

// leetcode-27
// 移除数组中的指定元素
// 时间复杂度：O(N^2) 空间复杂度：O(1)
func removeElement(nums []int, val int) int {
	ret := len(nums)
	for {
		find := false
		for i := 0; i < ret; i++ {
			if nums[i] == val {
				ret = removeIndex(nums, ret, i)
				find = true
				break
			}
		}
		if !find {
			break
		}
	}
	return ret
}

func removeIndex(nums []int, ret int, index int) int {
	for i := index + 1; i < ret; i++ {
		nums[i-1] = nums[i]
	}
	return ret - 1
}

// 时间复杂度：O(N) 空间复杂度：O(1)
func removeElement2(nums []int, val int) int {
	ret := 0
	//把nums[0..ret]当做新数组，不等于val的往里面插入
	for i := 0; i < len(nums); i++ {
		if nums[i] != val {
			nums[ret] = nums[i]
			ret++
		}
	}
	return ret
}
