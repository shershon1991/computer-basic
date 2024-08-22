#include <iostream>
#include <algorithm>

using namespace std;

// Leetcode-3
// 思想：滑动窗口
class Solution
{
public:
          int lengthOfLongestSubstring(string s)
          {
                    int freq[256] = {0};
                    int l = 0, r = -1; // 滑动窗口为s[l,...,r]
                    int res = 0;

                    while (l < s.size())
                    {
                              if (r + 1 < s.size() && freq[s[r + 1]] == 0)
                                        freq[s[++r]]++;
                              else
                                        freq[s[l++]]--;

                              res = max(res, r - l + 1);
                    }

                    return res;
          }
};

int main()
{

          return 0;
}