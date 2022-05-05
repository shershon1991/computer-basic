/**
 * @Author: shershon
 * @Description:
 * @Date: 2022/04/15 12:12 PM
 */

package removeDuplicates

// leetcode-26
// 删除排序数组中的重复项
// 时间复杂度O(N^2)，空间复杂度O(1)
func removeDuplicates(nums []int) int {
	idx := 0
	for idx < len(nums)-1 {
		if nums[idx] == nums[idx+1] { // 若相等则pop掉当前值
			nums = append(nums[:idx], nums[idx+1:]...)
		} else { // 否则move到下一位置继续做判断
			idx++
		}
	}
	return len(nums)
}

// 优化，时间复杂度O(N)，空间复杂度O(1)
func removeDuplicates2(nums []int) int {
	idx := 0
	for _, num := range nums {
		// 如果是第一位自然不可能重复（同时为了保证数组不越界）
		if (idx < 1) || (num != nums[idx-1]) {
			nums[idx] = num // 如果当前元素不是重复值，我们就将其分配到目前不重复元素到达的index
			idx++
		}
	}
	return idx
}
