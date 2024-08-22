/**
 * @Author: shershon
 * @Description: 递归和栈分别实现递归算法
 * @Date: 2023/03/23 14:57
**/
package other

var cityConfigMap = map[string]map[string]string{
	"1": {"id": "1", "parentId": "0", "name": "中国"},
	"2": {"id": "2", "parentId": "1", "name": "湖北省"},
	"3": {"id": "3", "parentId": "1", "name": "湖南省"},
	"4": {"id": "4", "parentId": "2", "name": "武汉市"},
	"5": {"id": "5", "parentId": "3", "name": "长沙市"},
	"6": {"id": "6", "parentId": "4", "name": "洪山区"},
}

/**
 * eg:
 * 输入: [2]
 * 输出: [2 4 6]
 */
// 使用递归操作
func getChildrenWithRecursion(parents []string) []string {
	if len(parents) == 0 {
		return []string{}
	}
	var children []string
	for _, v := range cityConfigMap {
		if contains(parents, v["parentId"]) {
			children = append(children, v["id"])
		}
	}
	return append(parents, getChildrenWithRecursion(children)...)
}

/**
 * eg:
 * 输入: 2
 * 输出: [2 4 6]
 */
// 使用栈优化递归操作
func getChildrenWithoutRecursion(cityId string) []string {
	var children []string
	selfCity, _ := cityConfigMap[cityId]
	children = append(children, cityId)

	// 入栈
	cityStack := make([]map[string]string, 0, 0)
	cityStack = append(cityStack, selfCity)

	for len(cityStack) > 0 {
		// 首先出栈
		checkCity := cityStack[len(cityStack)-1]
		cityStack = cityStack[:len(cityStack)-1]

		for _, v := range cityConfigMap {
			if v["parentId"] == checkCity["id"] {
				cityStack = append(cityStack, v)
				children = append(children, v["id"])
			}
		}
	}
	return children
}

func contains(slice []string, elem string) bool {
	for _, k := range slice {
		if k == elem {
			return true
		}
	}
	return false
}
