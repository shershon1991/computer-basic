/**
 * @Author: shershon
 * @Description:
 * @Date: 2022/06/27 10:51
 */

package main

import "fmt"

/**
 * isArraySort
 * @Description: 判断数组是否有序
 * @Author: Shershon
 * @param arr
 * @param length
 * @return bool
 * @date 2022-06-27 10:55:33
 **/
func isArraySort(arr []int, length int) bool {
	if length == 1 {
		return true
	}
	// 判断数据是否为升序
	if arr[length-1] <= arr[length-2] {
		return false
	} else {
		return isArraySort(arr, length-1)
	}
}

func main() {
	arr := []int{1, 2, 3, 4, 5, 0}
	rtn := isArraySort(arr, 6)
	fmt.Println(rtn)
}
