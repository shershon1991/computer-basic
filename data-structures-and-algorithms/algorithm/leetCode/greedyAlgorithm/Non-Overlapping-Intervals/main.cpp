#include <iostream>
#include <vector>
#include <algorithm>

using namespace std;

struct Interval
{
          int start;
          int end;
          Interval() : start(0), end(0) {}
          Interval(int s, int e) : start(s), end(e) {}
};

// 动态规划
/*bool compare(const Interval& a, const Interval& b) {
	if (a.start != b.start)
		return a.start < b.start;
	return a.end < b.end;
}
class Solution {
public:
	int eraseOverlapIntervals(vector<Interval>& intervals) {
		if (intervals.size() == 0)
			return 0;

		sort(intervals.begin(), intervals.end(), compare);

		// memo[i] 表示使用intervals[0,...,i]的区间能构成的最长不重叠区间序列的数目
		vector<int> memo(intervals.size(), 1);
		for (int i = 1; i < intervals.size(); i++)
			// memo[i]
			for (int j = 0; j < i; j++)
				if (intervals[i].start >= intervals[j].end)
					memo[i] = max(memo[i], 1 + memo[j]);

		int res = 0;
		for (int i = 0; i < memo.size(); i++)
			res = max(res, memo[i]);

		return intervals.size() - res;
	}
};*/

// 贪心算法
bool compare(const Interval &a, const Interval &b)
{
          if (a.end != b.end)
                    return a.end < b.end;
          return a.start < b.start;
}

// Leetcode-435
class Solution
{
public:
          int eraseOverlapIntervals(vector<Interval> &intervals)
          {
                    if (intervals.size() == 0)
                              return 0;

                    sort(intervals.begin(), intervals.end(), compare);

                    int res = 1;
                    int pre = 0;
                    for (int i = 1; i < intervals.size(); i++)
                              if (intervals[i].start >= intervals[pre].end)
                              {
                                        res++;
                                        pre = i;
                              }

                    return intervals.size() - res;
          }
};

int main()
{

          return 0;
}