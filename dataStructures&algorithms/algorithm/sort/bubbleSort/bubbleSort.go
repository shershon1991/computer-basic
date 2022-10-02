/**
 * @Author: shershon
 * @Description:
 * @Date: 2022/10/02 14:35
 */

package bubbleSort

// BubbleSort 冒泡排序
// 对给定的数组进行多次遍历，每次均比较相邻的两个数，如果前一个比后一个大，则交换这两个数。
// 经过第一次遍历之后，最大的数就在最右侧了；第二次遍历之后，第二大的数就在右数第二个位置了；以此类推。
func BubbleSort(data []int) []int {
	if len(data) <= 1 {
		return data
	}
	// 多次遍历
	for i := 0; i < len(data); i++ {
		// 两两比较
		for j := 1; j < len(data); j++ {
			// 前面大于后面，则替换位置
			if data[j] < data[j-1] {
				data[j], data[j-1] = data[j-1], data[j]
			}
		}
	}
	return data
}
