/**
 * @Author: shershon
 * @Description:
 * @Date: 2023/03/08 09:27
 */

package other

/*
*
eg:
输入: "abcd"
输出: [a b c d ab bc cd abc bcd abcd]
*/
func echoContinuousChar(str string) []string {
	var result, tmp []string
	length := len(str)
	for i := 1; i <= length; i++ {
		tmp = splitByLength(str, i)
		result = append(result, tmp...)
	}
	return result
}

func splitByLength(str string, length int) []string {
	var result []string
	for i := 0; i < len(str); i++ {
		end := i + length
		if end > len(str) {
			break
		}
		result = append(result, str[i:end])
	}
	return result
}
