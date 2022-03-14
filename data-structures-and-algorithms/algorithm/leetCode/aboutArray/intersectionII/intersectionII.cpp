#include <iostream>
#include <vector>
#include <map>

using namespace std;

// Leetcode-350
// 时间复杂度：O(nlogn)
// 空间复杂度：O(n)
class Solution
{
public:
          vector<int> intersection(vector<int> &nums1, vector<int> &nums2)
          {
                    // O(nlogn)
                    map<int, int> record;
                    for (int i = 0; i < nums1.size(); i++)
                              if (record.find(nums1[i]) == record.end())
                                        record.insert(make_pair(nums1[i], 1));
                              else
                                        record[nums1[i]]++;

                    // O(nlogn)
                    vector<int> resultVector;
                    for (int i = 0; i < nums2.size(); i++)
                              if (record.find(nums2[i]) != record.end() && record[nums2[i]] > 0)
                              {
                                        resultVector.push_back(nums2[i]);
                                        record[nums2[i]]--;
                                        if (record[nums2[i]] == 0)
                                                  record.erase(nums2[i]);
                              }

                    return resultVector;
          }
};

int main()
{
          int arr1[] = {4, 9, 5};
          int arr2[] = {9, 4, 9, 8, 4};
          vector<int> vec1(arr1, arr1 + sizeof(arr1) / sizeof(int));
          vector<int> vec2(arr2, arr2 + sizeof(arr2) / sizeof(int));

          vector<int> res = Solution().intersection(vec1, vec2);

          for (int i = 0; i < res.size(); i++)
                    cout << res[i] << " ";
          cout << endl;

          return 0;
}