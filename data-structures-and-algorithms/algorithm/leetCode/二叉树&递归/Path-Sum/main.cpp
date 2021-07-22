#include <iostream>

using namespace std;

struct TreeNode
{
          int val;
          TreeNode *left;
          TreeNode *right;
          TreeNode(int x) : val(x), left(NULL), right(NULL) {}
};

// Leetcode-112
class Solution
{
public:
          bool hasPathSum(TreeNode *root, int sum)
          {
                    if (root == NULL)
                              return false;

                    if (root->left == NULL && root->right == NULL)
                              return root->val == sum;

                    if (hasPathSum(root->left, sum - root->val))
                              return true;
                    if (hasPathSum(root->right, sum - root->val))
                              return true;

                    return false;
          }
};

int main()
{

          return 0;
}