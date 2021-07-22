#include <iostream>
#include <vector>
#include <cassert>

using namespace std;

// Leetcode-17
class Solution
{
private:
          const string letterMap[10] = {
              " ",    //0
              "",     //1
              "abc",  //2
              "def",  //3
              "ghi",  //4
              "jkl",  //5
              "mno",  //6
              "pqrs", //7
              "tuv",  //8
              "wxyz", //9
          };

          vector<string> res;

          // s中保存了此时从digits[0,...,index-1]翻译得到的一个字母字符串
          // 寻找和digits[index]匹配的字母，获得digits[0,...,index]翻译得到的解
          void findCombinations(const string &digits, int index, const string &s)
          {
                    if (index == digits.size())
                    {
                              res.push_back(s);
                              return;
                    }

                    char c = digits[index];
                    assert(c >= '0' && c <= '9' && c != '1');
                    string letters = letterMap[c - '0'];
                    for (int i = 0; i < letters.size(); i++)
                              findCombinations(digits, index + 1, s + letters[i]);

                    return;
          }

public:
          vector<string> letterCombinations(string digits)
          {
                    res.clear();

                    if (digits == "")
                              return res;

                    findCombinations(digits, 0, "");

                    return res;
          }
};

int main()
{

          return 0;
}