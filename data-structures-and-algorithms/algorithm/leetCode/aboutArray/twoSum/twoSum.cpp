#include <iostream>
#include <vector>
#include <cassert>
#include <stdexcept>

using namespace std;

// Leetcode-167
// 最直接的思考：暴力解法，双层遍历，O(n^2)
class Solution
{
public:
          // 对撞指针
          // 时间复杂度：O(n)
          // 空间复杂度：O(1)
          vector<int> twoSum(vector<int> &numbers, int target)
          {
                    assert(numbers.size() >= 2);

                    int l = 0, r = numbers.size() - 1;
                    while (l < r)
                    {
                              if (numbers[l] + numbers[r] == target)
                              {
                                        int res[2] = {l + 1, r + 1};
                                        return vector<int>(res, res + 2);
                              }
                              else if (numbers[l] + numbers[r] < target)
                                        l++;
                              else
                                        r--;
                    }

                    throw invalid_argument("The input has no solution.");
          }
};

int main()
{
          int arr[] = {2, 7, 11, 15};
          vector<int> vec(arr, arr + sizeof(arr) / sizeof(int));

          vector<int> res = Solution().twoSum(vec, 22);

          for (int i = 0; i < res.size(); i++)
                    cout << res[i] << " ";
          cout << endl;

          return 0;
}