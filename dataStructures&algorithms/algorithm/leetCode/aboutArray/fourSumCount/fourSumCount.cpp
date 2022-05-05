#include <iostream>
#include <vector>
#include <unordered_map>
#include <cassert>

using namespace std;

// Leetcode-454
// 时间复杂度：O(n^2)
// 空间复杂度：O(n^2)
class Solution
{
public:
          int fourSumCount(vector<int> &A, vector<int> &B, vector<int> &C, vector<int> &D)
          {
                    assert(A.size() == B.size() && B.size() == C.size() && C.size() == D.size());

                    unordered_map<int, int> record;
                    for (int i = 0; i < A.size(); i++)
                              for (int j = 0; j < B.size(); j++)
                                        record[A[i] + B[j]]++;

                    int res = 0;
                    for (int i = 0; i < C.size(); i++)
                              for (int j = 0; j < D.size(); j++)
                                        if (record.find(0 - C[i] - D[j]) != record.end())
                                                  res += record[0 - C[i] - D[j]];

                    return res;
          }
};

int main()
{
          int arr1[] = {1, 2};
          int arr2[] = {-2, -1};
          int arr3[] = {-1, 2};
          int arr4[] = {0, 2};
          vector<int> vec1(arr1, arr1 + sizeof(arr1) / sizeof(int));
          vector<int> vec2(arr2, arr2 + sizeof(arr2) / sizeof(int));
          vector<int> vec3(arr3, arr3 + sizeof(arr3) / sizeof(int));
          vector<int> vec4(arr4, arr4 + sizeof(arr4) / sizeof(int));

          int res = Solution().fourSumCount(vec1, vec2, vec3, vec4);

          cout << res << endl;

          return 0;
}