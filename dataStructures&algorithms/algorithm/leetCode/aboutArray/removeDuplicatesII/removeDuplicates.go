/**
 * @Author: shershon
 * @Description:
 * @Date: 2022/04/15 12:12 PM
 */

package removeDuplicates

// leetcode-80
// 删除排序数组中的重复项II
// 时间复杂度O(N)，空间复杂度O(1)
func removeDuplicates(nums []int) int {
	idx := 0
	for _, num := range nums {
		// 如果是前两位自然不可能重复两次以上（同时为了保证数组不越界）
		if (idx < 2) || (num != nums[idx-2]) {
			nums[idx] = num // 如果当前元素没有重复两次以上，我们就将其assign到目前不重复元素到达的index
			idx++
		}
	}
	return idx
}
