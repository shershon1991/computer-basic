/**
 * @Author: shershon
 * @Description:
 * @Date: 2022/03/12 11:35 PM
 */

package main

// 二分查找，leetCode-704
// 非递归
func binarySearch(arr []int, target int) bool {
	low := 0
	high := len(arr) - 1
	for low <= high {
		mid := (low + high) / 2
		if target == arr[mid] {
			return true
		} else if target > arr[mid] {
			low = mid + 1
		} else {
			high = mid - 1
		}
	}
	return false
}

// 递归
func binarySearchRecursion(arr []int, target, low, high int) bool {
	if low > high {
		return false
	}
	mid := (low + high) / 2
	if target == arr[mid] {
		return true
	} else if target > arr[mid] {
		return binarySearchRecursion(arr, target, mid+1, high)
	} else {
		return binarySearchRecursion(arr, target, low, mid-1)
	}
}
