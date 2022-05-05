#include <iostream>
#include <vector>

using namespace std;

// Leetcode-46
class Solution
{
private:
          vector<vector<int> > res;
          vector<bool> used;

          // p中保存了一个有index个元素的排列
          // 向这个排列的末尾添加第index+1个元素，获得一个有index+1个元素的排列
          void generatePermutation(const vector<int> &nums, int index, vector<int> &p)
          {
                    if (index == nums.size())
                    {
                              res.push_back(p);
                              return;
                    }

                    for (int i = 0; i < nums.size(); i++)
                              if (!used[i])
                              {
                                        // 将nums[i]添加到p中
                                        p.push_back(nums[i]);
                                        used[i] = true;
                                        generatePermutation(nums, index + 1, p);
                                        p.pop_back();
                                        used[i] = false;
                              }

                    return;
          }

public:
          vector<vector<int> > permute(vector<int> &nums)
          {
                    res.clear();
                    if (nums.size() == 0)
                              return res;

                    used = vector<bool>(nums.size(), false);
                    vector<int> p;
                    generatePermutation(nums, 0, p);

                    return res;
          }
};

int main()
{
          vector<int> nums = {1, 2, 3};
          vector<vector<int> > res = Solution().permute(nums);

          for (int i = 0; i < res.size(); i++)
          {
                    cout << "[";
                    for (int j = 0; j < res[i].size(); j++)
                    {
                              cout << res[i][j] << " ";
                    }
                    cout << "]" << endl;
          }

          return 0;
}