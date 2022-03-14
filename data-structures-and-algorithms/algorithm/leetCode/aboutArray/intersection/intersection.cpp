#include <iostream>
#include <vector>
#include <set>

using namespace std;

// Leetcode-349
// 时间复杂度：O(nlogn)
// 空间复杂度：O(n)
class Solution
{
public:
          vector<int> intersection(vector<int> &nums1, vector<int> &nums2)
          {
                    // O(nlogn)
                    set<int> record(nums1.begin(), nums1.end());
                    /*
                    set<int> record;
                    for (int i = 0; i < nums1.size(); i++)
			record.insert(nums1[i]);
                    */

                    // O(nlogn)
                    set<int> resultSet;
                    for (int i = 0; i < nums2.size(); i++)
                              if (record.find(nums2[i]) != record.end())
                                        resultSet.insert(nums2[i]);

                    /*
                    vector<int> resultVector;
		for (set<int>::iterator iter = resultSet.begin(); iter != resultSet.end(); iter++)
			resultVector.push_back(*iter);
		return resultVector;
                    */
                    // O(n )
                    return vector<int>(resultSet.begin(), resultSet.end());
          }
};

int main()
{
          int arr1[] = {1, 2, 2, 1};
          int arr2[] = {2, 2, 1};
          vector<int> vec1(arr1, arr1 + sizeof(arr1) / sizeof(int));
          vector<int> vec2(arr2, arr2 + sizeof(arr2) / sizeof(int));

          vector<int> res = Solution().intersection(vec1, vec2);

          for (int i = 0; i < res.size(); i++)
                    cout << res[i] << " ";
          cout << endl;

          return 0;
}