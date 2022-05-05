#include <iostream>
#include <vector>

using namespace std;

// LeetCode-283
class Solution
{
public:
          // 时间复杂度：O(n)
          // 空间复杂度：O(n)
          void moveZeroes(vector<int> &nums)
          {
                    vector<int> nonZeroElements;

                    for (int i = 0; i < nums.size(); i++)
                              if (nums[i])
                                        nonZeroElements.push_back(nums[i]);

                    for (int i = 0; i < nonZeroElements.size(); i++)
                              nums[i] = nonZeroElements[i];

                    for (int i = nonZeroElements.size(); i < nums.size(); i++)
                              nums[i] = 0;
          }

          // 优化
          // 时间复杂度：O(n)
          // 空间复杂度：O(1)
          void moveZeroesOpt(vector<int> &nums)
          {
                    int k = 0; // [0,...,k)中的元素均为非零元素

                    // 遍历到第i个元素后，保证[0,...,i]中所有非0元素
                    // 都按照顺序排列在[0,...,k)中
                    for (int i = 0; i < nums.size(); i++)
                              if (nums[i])
                                        nums[k++] = nums[i];

                    // 将nums剩余的位置设置为0
                    for (int i = k; i < nums.size(); i++)
                              nums[i] = 0;
          }

          // 优化2
          // 时间复杂度：O(n)
          // 空间复杂度：O(1)
          void moveZeroesOpt2(vector<int> &nums)
          {
                    int k = 0; // [0,...,k)中的元素均为非零元素

                    // 遍历到第i个元素后，保证[0,...,i]中所有非0元素
                    // 都按照顺序排列在[0,...,k)中
                    // 同时，[k,...,i]均为0
                    for (int i = 0; i < nums.size(); i++)
                              if (nums[i])
                              {
                                        if (i != k)
                                                  swap(nums[k++], nums[i]);
                                        else
                                                  k++;
                              }
                    // 将nums剩余的位置设置为0
                    for (int i = k; i < nums.size(); i++)
                              nums[i] = 0;
          }
};

int main()
{
          int arr[] = {0, 1, 0, 3, 12};
          vector<int> vec(arr, arr + sizeof(arr) / sizeof(int));

          // Solution().moveZeroes(vec);
          // Solution().moveZeroesOpt(vec);
          Solution().moveZeroesOpt2(vec);

          for (int i = 0; i < vec.size(); i++)
                    cout << vec[i] << " ";
          cout << endl;

          return 0;
}