/**
 * @Author: shershon
 * @Description:
 * @Date: 2022/04/14 10:51 AM
 */

package intToRoman

// leetcode-12
// 整数转罗马数字
// 时间复杂度：O(n) 空间复杂度：O(1)
func intToRoman(num int) string {
	// 初始化了一个一一对应的map，方便后面取出符号。
	lookupSymbol := []string{"M", "CM", "D", "CD", "C", "XC", "L", "XL", "X", "IX", "V", "IV", "I"}
	lookupNum := []int{1000, 900, 500, 400, 100, 90, 50, 40, 10, 9, 5, 4, 1}
	roman := ""
	for i, symbol := range lookupSymbol {
		val := lookupNum[i]
		for num >= val {
			roman += symbol
			num -= val
		}
	}
	return roman
}

// leetcode-13
// 罗马数字转整数
// 时间复杂度：O(n) 空间复杂度：O(1)
func romanToInt(s string) int {
	// 初始化了一个一一对应的map，方便后面取出符号。
	lookup := make(map[byte]int)
	lookup['I'] = 1
	lookup['V'] = 5
	lookup['X'] = 10
	lookup['L'] = 50
	lookup['C'] = 100
	lookup['D'] = 500
	lookup['M'] = 1000

	res := 0
	for i, _ := range s {
		if i > 0 && lookup[s[i]] > lookup[s[i-1]] {
			res += lookup[s[i]] - 2*lookup[s[i-1]]
		} else {
			res += lookup[s[i]]
		}
	}
	return res
}
