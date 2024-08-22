/**
 * @Author: shershon
 * @Description:
 * @Date: 2023/03/06 15:11
 */

package mergeSortedArr

// leetcode-88
func mergeSortedArr(a, b []int) (result []int) {
	len1 := len(a)
	len2 := len(b)
	var i, j int = 0, 0
	for {
		if i == len1 {
			result = append(result, b[i-1:]...)
			break
		}
		if j == len2 {
			result = append(result, a[j-1:]...)
			break
		}
		if a[i] < b[j] {
			result = append(result, a[i])
			i++
		} else {
			result = append(result, b[j])
			j++
		}
	}
	return result
}
