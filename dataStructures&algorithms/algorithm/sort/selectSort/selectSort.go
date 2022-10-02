/**
 * @Author: shershon
 * @Description:
 * @Date: 2022/10/02 14:34
 */

package selectSort

// SelectSort 选择排序
// 基本思想： 选择排序的原理是，对给定的数组进行多次遍历，每次均找出最大的一个值的索引。
func SelectSort(data []int) []int {
	// 只有一个不用比较
	length := len(data)
	if length <= 1 {
		return data
	}
	// 对给定的数组进行多次遍历
	for i := 0; i < len(data); i++ {
		// 先假设第一元素索引最小
		k := i
		// 遍历找出最小的
		for j := i + 1; j < len(data); j++ {
			if data[j] < data[k] {
				// 找到更小的，则替换索引值
				k = j
			}
		}
		// 替换元素位置
		if k != i {
			data[i], data[k] = data[k], data[i]
		}
	}
	return data
}
