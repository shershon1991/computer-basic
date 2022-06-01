/**
 * @Author: shershon
 * @Description:
 * @Date: 2022/06/01 12:17 PM
 */

package main

import (
	"bufio"
	"fmt"
	"os"
	"strconv"
	"strings"
)

/**
 * add
 * @Description:
 * @Author: Shershon
 * @param a
 * @param b
 * @return res
 * @date 2022-06-01 17:17:11
 **/
func add(a, b string) (res string) {
	lenA := len(a)
	lenB := len(b)
	lenBase := 0

	if lenA > lenB {
		lenBase = lenA
	} else {
		lenBase = lenB
	}

	j := 0 // 进位数
	res = ""
	indexA := lenA - 1
	indexB := lenB - 1
	itemA := 0
	itemB := 0
	for indexBase := lenBase - 1; indexBase >= 0; indexBase-- {
		itemA = 0
		if indexA >= 0 {
			itemA, _ = strconv.Atoi(string(a[indexA]))
			indexA--
		}
		itemB = 0
		if itemB >= 0 {
			itemB, _ = strconv.Atoi(string(b[indexB]))
			indexB--
		}
		sum := itemA + itemB + j
		if sum >= 10 {
			j = 1
			sum = sum - 10
		} else {
			j = 0
		}
		res = strconv.Itoa(sum) + res
	}
	if j > 0 {
		res = strconv.Itoa(j) + res
	}
	return
}

func main() {
	fmt.Println("Input a+b:")
	reader := bufio.NewReader(os.Stdin)
	result, _, err := reader.ReadLine()
	if err != nil {
		fmt.Printf("read from console error: %v", err)
	}

	strSlice := strings.Split(string(result), "+")
	if len(strSlice) != 2 {
		fmt.Println("Please input  a+b")
	}
	strNum1 := strings.TrimSpace(strSlice[0])
	strNum2 := strings.TrimSpace(strSlice[1])
	resMultiply := add(strNum1, strNum2)
	fmt.Printf("add result = %s\n", resMultiply)
}
