/**
 * @Author: shershon
 * @Description:
 * @Date: 2022/04/13 12:53 PM
 */

package reverse

// Leetcode-7
// 时间复杂度: O(lgx) 空间复杂度: O(1)
func reverse(x int) int {
	if x < 0 {
		return -reverse(-x)
	}

	var res int
	for x != 0 {
		res = res*10 + x%10
		x /= 10
	}

	if res <= 0x7fffffff {
		return res
	}
	return 0
}
