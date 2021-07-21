#include <iostream>
#include <algorithm>
#include <vector>
#include <cassert>

using namespace std;

// Leetcode-343
class Solution
{
private:
          vector<int> memo;

          int max3(int a, int b, int c)
          {
                    return max(a, max(b, c));
          }

          // 将n进行分割（至少分割成两部分），可以获得的最大乘积
          int breakInteger(int n)
          {
                    if (n == 1)
                              return 1;

                    if (memo[n] != -1)
                              return memo[n];

                    int res = -1;
                    for (int i = 1; i <= n - 1; i++)
                              // i+(n-i)
                              res = max3(res, i * (n - i), i * breakInteger(n - i));

                    memo[n] = res;
                    return res;
          }

public:
          // 记忆化搜索
          int integerBreak(int n)
          {
                    assert(n >= 2);
                    memo = vector<int>(n + 1, -1);
                    return breakInteger(n);
          }

          // 动态规划
          int integerBreak2(int n)
          {
                    assert(n >= 2);

                    vector<int> memo(n + 1, -1);

                    memo[1] = 1;
                    for (int i = 2; i <= n; i++)
                              //求解memo[i]
                              for (int j = 1; j <= i - 1; j++)
                                        // j+(i-j)
                                        memo[i] = max3(memo[i], j * (i - j), j * memo[i - j]);

                    return memo[n];
          }
};

int main()
{

          return 0;
}