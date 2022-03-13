#include <iostream>
#include <vector>

using namespace std;

// Leetcode-70
class Solution
{
private:
      vector<int> memo;

      int calcWays(int n)
      {
            if (n == 1)
                      return 1;
            if (n == 2)
                      return 2;

            if (memo[n] == -1)
                memo[n] = calcWays(n - 1) + calcWays(n - 2);

            return memo[n];
      }

public:
      int climbStairs(int n)
      {
            memo = vector<int>(n + 1, -1);

            return calcWays(n);
      }

      int climbStairs2(int n)
      {
            vector<int> memo(n + 1, -1);

            memo[1] = 1;
            memo[2] = 2;

            for (int i = 3; i <= n; i++)
                  memo[i] = memo[i - 1] + memo[i - 2];

            return memo[n];
      }
};

int main()
{

      return 0;
}