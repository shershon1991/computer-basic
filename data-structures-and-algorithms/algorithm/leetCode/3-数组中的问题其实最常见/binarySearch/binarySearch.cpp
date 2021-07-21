#include <iostream>
#include <cmath>
#include <cassert>
#include <ctime>
#include "MyUtil.h"

using namespace std;

template <typename T>
int binarySearch(T arr[], int n, T target)
{
          int l = 0, r = n - 1; // 在[l...r]的范围里查找target
          while (l <= r)
          { // 在l==r时，区间[l...r]依然是有效的
                    int mid = l + (r - l) / 2;
                    if (arr[mid] == target)
                              return mid;
                    if (arr[mid] < target)
                              l = mid + 1;
                    else
                              r = mid - 1;
          }

          return -1;
}

int main()
{
          int n = 1000000;
          int *data = MyUtil::generateOrderedArray(n);

          clock_t startTime = clock();
          for (int i = 0; i < n; i++)
                    assert(i == binarySearch(data, n, i));
          clock_t endTime = clock();

          cout << "binarySearch test complete." << endl;
          cout << "Time cost: " << double(endTime - startTime) / CLOCKS_PER_SEC << " s" << endl;

          return 0;
}
