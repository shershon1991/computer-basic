/**
 * @Author: shershon
 * @Description:
 * @Date: 2022/10/02 14:36
 */

package quickSort

// QuickSort 快速排序
// 根据找到的基准值，把待排序的数组‘平均’分成两组，即大于基准值的为一组，小于基准值的为一组。
// 然后对两个组再次按照上述方法进行操作，最后合并结果。
func QuickSort(data []int) []int {
	if len(data) <= 1 {
		return data
	}
	// 定义基准值
	benchMark := data[0]
	// 小于基准值的组
	leftGroup := []int{}
	// 大于基准值的组
	rightGroup := []int{}
	// 遍历分组
	for i := 1; i < len(data); i++ {
		// 假设第一个元素
		if data[i] > benchMark {
			rightGroup = append(rightGroup, data[i])
		} else {
			leftGroup = append(leftGroup, data[i])
		}
	}
	// 分组后继续操作
	rightGroup = QuickSort(rightGroup)
	leftGroup = QuickSort(leftGroup)
	// 合并结果
	leftGroup = append(leftGroup, benchMark)
	for i := 0; i < len(rightGroup); i++ {
		leftGroup = append(leftGroup, rightGroup[i])
	}
	return leftGroup
}
