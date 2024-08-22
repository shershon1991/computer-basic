/**
 * @Author: shershon
 * @Description:
 * @Date: 2022/06/26 16:01
 */

package main

import "fmt"

func split2(s string) string {
	n := len(s)
	if n <= 3 {
		return s
	}
	return split2(s[:n-3]) + "," + s[n-3:]
}

func main() {
	var ss string
	ss = split2("123456789")
	fmt.Println(ss)
}
