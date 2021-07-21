#include <vector>
#include <iostream>
#include <algorithm>

using namespace std;

// Leetcode-209
// 思想：滑动窗口
// 时间复杂度：O(n)
// 空间复杂度：O(1)
class Solution
{
public:
          int minSubArrayLen(int s, vector<int> &nums)
          {
                    int l = 0, r = -1; // nums[l,...,r]为我们的滑动窗口
                    int sum = 0;
                    int res = nums.size() + 1;

                    while (l < nums.size())
                    {
                              if (r + 1 < nums.size() && sum < s)
                                        sum += nums[++r];
                              else
                                        sum -= nums[l++];

                              if (sum >= s)
                                        res = min(res, r - l + 1);
                    }

                    if (res == nums.size() + 1)
                              return 0;

                    return res;
          }
};

int main()
{
          int arr[] = {2, 3, 1, 2, 4, 3};
          vector<int> vec(arr, arr + sizeof(arr) / sizeof(int));

          int res = Solution().minSubArrayLen(8, vec);

          cout << res << endl;

          return 0;
}