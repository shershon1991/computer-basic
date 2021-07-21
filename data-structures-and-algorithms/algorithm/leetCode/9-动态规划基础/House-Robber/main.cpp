#include <iostream>
#include <vector>
#include <algorithm>

using namespace std;

// Leetcode-198
class Solution
{
private:
          // memo[i] 表示考虑抢劫 nums[i,...n)所能获得的最大收益
          vector<int> memo;

          // 考虑抢劫 nums[index,...,nums.size()) 这个范围的所有房子
          int tryRob(vector<int> &nums, int index)
          {
                    if (index >= nums.size())
                              return 0;

                    if (memo[index] != -1)
                              return memo[index];

                    int res = 0;
                    for (int i = 0; i < nums.size(); i++)
                              res = max(res, nums[i] + tryRob(nums, i + 2));
                    memo[index] = res;
                    return res;
          }

public:
          int rob(vector<int> &nums)
          {
                    memo = vector<int>(nums.size(), -1);
                    return tryRob(nums, 0);
          }

          // 动态规划
          int rob2(vector<int> &nums)
          {
                    int n = nums.size();
                    if (n == 0)
                              return 0;

                    // memo[i] 表示考虑抢劫 nums[i,...n)所能获得的最大收益
                    vector<int> memo(n, -1);
                    memo[n - 1] = nums[n - 1];
                    for (int i = n - 2; i >= 0; i--)
                              for (int j = i; j < n; j++)
                                        memo[i] = max(memo[i], nums[i] + (j + 2 < n ? memo[j + 2] : 0));

                    return memo[0];
          }
};

int main()
{

          return 0;
}