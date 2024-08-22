/**
 * @Author: shershon
 * @Description:
 * @Date: 2022/04/20 1:37 PM
 */

package myAtoi

import (
	"math/big"
	"strconv"
	"strings"
)

func myAtoi(s string) int {
	strAfterStrip := strings.Trim(s, " ")
	if strAfterStrip == "" {
		return 0
	}
	sumsRune := make([]rune, 0)
	for i, _ := range strAfterStrip {
		sumsRune = append(sumsRune, rune(strAfterStrip[i]))
	}
	var positive bool = true
	if sumsRune[0] == rune('+') || sumsRune[0] == rune('-') { // 记录正负号
		if sumsRune[0] == rune('-') {
			positive = false
		}
		sumsRune = sumsRune[1:]
	} else if sumsRune[0] < '0' || sumsRune[0] > '9' { // 如果第一位不是数字也不是正负号，那么按照 example 4 返回 0
		return 0
	}
	strNum := new(big.Int)
	for _, ru := range sumsRune {
		if ru >= '0' && ru <= '9' {
			strNum = strNum.Add(strNum.Mul(strNum, big.NewInt(10)), big.NewInt(int64(ru-'0')))
		} else { // 一旦不是数字了就不需要继续了
			break
		}
	}
	if strNum.Cmp(big.NewInt(1<<31-1)) == 1 { // 数字越界情况
		if !positive {
			res, _ := strconv.Atoi(big.NewInt(-(1 << 31)).String())
			return res
		} else {
			res, _ := strconv.Atoi(big.NewInt(1<<31 - 1).String())
			return res
		}
	}
	res, _ := strconv.Atoi(strNum.String())
	if !positive { // 根据之前的正负号结果返回对应数值
		res = -res
	}
	return res
}
