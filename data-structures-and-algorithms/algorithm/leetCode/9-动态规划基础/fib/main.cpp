#include <iostream>
#include <ctime>
#include <vector>

using namespace std;

vector<int> memo;
int num = 0;

/*
动态规划：将原问题拆解成若干个子问题，同时保存子问题的答案，使得每个子问题只求解一次，最终获得原问题的答案。
遇到递归问题==》重叠子问题，两种解决方法：
1.记忆化搜索（自顶向下的解决问题）
2.动态规划（自低向上的解决问题）
*/

// 记忆化搜索（自上向下的解决问题）
int fib(int n)
{
          num++;

          if (n == 0)
                    return 0;

          if (n == 1)
                    return 1;

          //return fib(n - 1) + fib(n - 2);

          if (memo[n] == -1)
                    memo[n] = fib(n - 1) + fib(n - 2);
          return memo[n];
}

// 动态规划（自下向上的解决问题）
int fib2(int n)
{
          vector<int> memo(n + 1, -1);

          memo[0] = 0;
          memo[1] = 1;
          for (int i = 2; i <= n; i++)
                    memo[i] = memo[i - 1] + memo[i - 2];

          return memo[n];
}

int main()
{
          num = 0;

          int n = 1000;
          memo = vector<int>(n + 1, -1);
          time_t startTime = clock();
          int res = fib(n);
          time_t endTime = clock();

          cout << "fib(" << n << ") = " << res << endl;
          cout << "time: " << double(endTime - startTime) / CLOCKS_PER_SEC << " s" << endl;
          cout << "run function fib() " << num << "times." << endl;

          return 0;
}

int main2()
{
          int n = 1000;

          time_t startTime = clock();
          int res = fib2(n);
          time_t endTime = clock();

          cout << "fib2(" << n << ") = " << res << endl;
          cout << "time: " << double(endTime - startTime) / CLOCKS_PER_SEC << " s" << endl;

          return 0;
}