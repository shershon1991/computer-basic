#include <iostream>
#include <vector>
#include <cassert>
#include <unordered_map>

using namespace std;

// Leetcode-1
// 时间复杂度：O(n)
// 空间复杂度：O(n)
class Solution
{
public:
          vector<int> twoSum(vector<int> &nums, int target)
          {
                    unordered_map<int, int> record;
                    for (int i = 0; i < nums.size(); i++)
                    {
                              int complement = target - nums[i];
                              if (record.find(complement) != record.end())
                              {
                                        int res[2] = {i, record[complement]};
                                        return vector<int>(res, res + 2);
                              }

                              record[nums[i]] = i;
                    }

                    throw invalid_argument("The input has no solution.");
          }
};

int main()
{
          int arr[] = {2, 7, 11, 15};
          vector<int> vec(arr, arr + sizeof(arr) / sizeof(int));

          vector<int> res = Solution().twoSum(vec, 9);

          for (int i = 0; i < res.size(); i++)
                    cout << res[i] << " ";
          cout << endl;

          return 0;
}