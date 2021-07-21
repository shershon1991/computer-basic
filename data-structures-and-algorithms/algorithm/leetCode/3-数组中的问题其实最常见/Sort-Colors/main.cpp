#include <iostream>
#include <vector>
#include <cassert>

using namespace std;

//Leetcode-75
class Solution
{
public:
          // 时间复杂度：O(n)
          // 空间复杂度：O(k), k为元素的取值范围 => O(1)
          void sortColors(vector<int> &nums)
          {
                    int count[3] = {0}; // 存放0,1,2三个元素的频率
                    for (int i = 0; i < nums.size(); i++)
                    {
                              assert(nums[i] >= 0 && nums[i] <= 2);
                              count[nums[i]]++;
                    }

                    int index = 0;
                    for (int i = 0; i < count[0]; i++)
                              nums[index++] = 0;
                    for (int i = 0; i < count[1]; i++)
                              nums[index++] = 1;
                    for (int i = 0; i < count[2]; i++)
                              nums[index++] = 2;
          }

          // 时间复杂度：O(n)
          // 空间复杂度：O(1)
          // 只遍历一遍
          void sortColors2(vector<int> &nums)
          {
                    int zero = -1;         // nums[0,...,zero] == 0
                    int two = nums.size(); // nums[two,...,n-1] == 2

                    for (int i = 0; i < two;)
                    {
                              if (nums[i] == 1)
                              {
                                        i++;
                              }
                              else if (nums[i] == 2)
                              {
                                        two--;
                                        swap(nums[i], nums[two]);
                              }
                              else
                              { // nums[i] == 0
                                        assert(nums[i] == 0);
                                        zero++;
                                        swap(nums[i], nums[zero]);
                                        i++;
                              }
                    }
          }
};

int main()
{
          int arr[] = {0, 0, 2, 0, 1, 1};
          vector<int> vec(arr, arr + sizeof(arr) / sizeof(int));

          // Solution().sortColors(vec);
          Solution().sortColors2(vec);

          for (int i = 0; i < vec.size(); i++)
                    cout << vec[i] << " ";
          cout << endl;

          return 0;
}