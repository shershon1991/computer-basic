/**
 * @Author: shershon
 * @Description:
 * @Date: 2022/10/02 14:37
 */

package binarySearch

// BinarySearch 二分查找，返回索引值,不存在则返回-1
func BinarySearch(data []int, beginIndex, endIndex, search int) int {
	// 大前提条件
	if beginIndex <= endIndex {
		// 计算中间下标
		middenIndex := (beginIndex + endIndex) / 2
		if data[middenIndex] == search {
			return middenIndex
		} else if search < data[middenIndex] {
			// 如果查找的值，小于中间值
			return BinarySearch(data, beginIndex, middenIndex-1, search)
		} else {
			// 如果查找的值，大于中间值
			return BinarySearch(data, middenIndex+1, endIndex, search)
		}
	}
	return -1
}

// BinarySearch2 二分查找
func BinarySearch2(data []int, search int) int {
	beginIndex := 0
	endIndex := len(data) - 1
	for beginIndex <= endIndex {
		midIndex := (endIndex + beginIndex) / 2
		if data[midIndex] == search {
			return midIndex
		} else if search < data[midIndex] {
			endIndex = midIndex - 1
		} else {
			beginIndex = midIndex + 1
		}
	}

	return -1
}
