/**
 * @Author: shershon
 * @Description:
 * @Date: 2022/04/22 12:49 PM
 */

package letterCombinations

import list2 "container/list"

// leetcode-17
// 电话号码的字母组合
func letterCombinations(digits string) []string {
	letters := []string{"", "", "abc", "def", "ghi", "jkl", "mno", "pqrs", "tuv", "wxyz"}
	if len(digits) == 0 {
		return make([]string, 0)
	}
	list := list2.New()
	list.PushBack("")
	//n个字母的字符串，要再加上一个字母变成n+1个字符的字符串
	//而这个字母有k种选择，这里的数据结构选用队列
	//每次需要加上一个字母时，一个个出列，丢进队列k个处理后的字符串
	for _, digit := range digits {
		letter := letters[digit-'0']
		n := list.Len()
		for j := 0; j < n; j++ {
			s := list.Front()
			list.Remove(s)
			for _, c := range letter {
				list.PushBack(s.Value.(string) + string(c))
			}
		}
	}
	ret := make([]string, 0)
	for {
		ret = append(ret, list.Front().Value.(string))
		list.Remove(list.Front())
		if list.Len() == 0 {
			break
		}
	}
	return ret
}
