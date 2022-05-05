/**
 * @Author: shershon
 * @Description:
 * @Date: 2022/04/28 9:13 PM
 */

package nextPermutation

// leetcode-31
// 下一个排列
// 时间复杂度: O (N) 空间复杂度: O (1)
func nextPermutation(nums []int) {
	n := len(nums)
	idx := n - 2
	//寻找从右边开始第一个比右边小的数
	for idx >= 0 && nums[idx] >= nums[idx+1] {
		idx--
	}
	if idx >= 0 {
		next := n - 1
		//寻找nums[idx]的下一个数
		for next >= 0 && nums[next] <= nums[idx] {
			next--
		}
		//交换nums[idx]和nums[next]
		temp := nums[idx]
		nums[idx] = nums[next]
		nums[next] = temp
	}
	//将nums[idx+1..]倒过来
	left := idx + 1
	right := n - 1
	for left < right {
		temp := nums[left]
		nums[left] = nums[right]
		nums[right] = temp
		left++
		right--
	}
}
