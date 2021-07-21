#include <iostream>
#include <vector>
#include <unordered_set>

using namespace std;

// Leetcode-219
// 时间复杂度：O(n)
// 空间复杂度：O(k)
class Solution
{
public:
          bool containsNearbyDuplicate(vector<int> &nums, int k)
          {
                    unordered_set<int> record;
                    for (int i = 0; i < nums.size(); i++)
                    {
                              if (record.find(nums[i]) != record.end())
                                        return true;

                              record.insert(nums[i]);

                              // 保持record中最多有k个元素
                              if (record.size() == k + 1)
                                        record.erase(nums[i - k]);
                    }

                    return false;
          }
};

int main()
{

          return 0;
}