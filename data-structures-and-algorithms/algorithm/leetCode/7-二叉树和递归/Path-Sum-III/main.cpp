#include <iostream>

using namespace std;

//Definition for a binary tree node.
struct TreeNode
{
          int val;
          TreeNode *left;
          TreeNode *right;
          TreeNode(int x) : val(x), left(NULL), right(NULL) {}
};

// LeetCode(437)
// 找出路径和等于给定数值的路径总数。
class Solution
{
public:
          int pathSum(TreeNode *root, int sum)
          {
                    if (root == NULL)
                              return 0;

                    int res = findPath(root, sum);
                    res += pathSum(root->left, sum);
                    res += pathSum(root->right, sum);

                    return res;
          }

private:
          // 在以node为根结点的二叉树中，寻找包含node的路径，和为sum
          // 返回这样的路径个数
          int findPath(TreeNode *node, int num)
          {
                    if (node == NULL)
                              return 0;

                    int res = 0;
                    if (node->val == num)
                              res += 1;

                    res += findPath(node->left, num - node->val);
                    res += findPath(node->right, num - node->val);

                    return res;
          }
};

int main()
{

          return 0;
}