/**
 * @Author: shershon
 * @Description:
 * @Date: 2022/10/02 14:36
 */

package InsertSort

// InsertSort 插入排序
// 从第二个数开始向右侧遍历,如果左侧的元素比取的数大，则互换位置
func InsertSort(data []int) []int {
	fmt.Println("length=", len(data))
	if len(data) <= 1 {
		return data
	}
	for i := 1; i < len(data); i++ {
		value := data[i]
		// 左侧数据index
		j := i - 1
		for j >= 0 && data[j] > value {
			// 如果左侧的元素比取的数大，则右移
			data[j+1] = data[j]
			data[j] = value
			// 依次和取的数进行比较
			j--
		}
	}
	return data
}
