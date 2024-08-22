#include <iostream>
#include <vector>
#include <unordered_map>

using namespace std;

// Leetcode-447
// 时间复杂度：O(n^2)
// 空间复杂度：O(n)
class Solution
{
public:
          int numberOfBoomeranges(vector<pair<int, int> > &points)
          {
                    int res = 0;

                    for (int i = 0; i < points.size(); i++)
                    {
                              unordered_map<int, int> record;
                              for (int j = 0; j < points.size(); j++)
                                        if (j != i)
                                                  record[dis(points[i], points[j])]++;

                              for (unordered_map<int, int>::iterator iter = record.begin(); iter != record.end(); iter++)
                                        if (iter->second >= 2) // 可以注释该行
                                                  res += (iter->second) * (iter->second - 1);
                    }

                    return res;
          }

private:
          int dis(const pair<int, int> &pa, const pair<int, int> &pb)
          {
                    return (pa.first - pb.first) * (pa.first - pb.first) + (pa.second - pb.second) * (pa.second - pb.second);
          }
};

int main()
{

          return 0;
}