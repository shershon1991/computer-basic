#include <iostream>
#include <vector>
#include <string>

using namespace std;

//Definition for a binary tree node.
struct TreeNode {
    int val;
    TreeNode *left;
    TreeNode *right;
    TreeNode(int x) : val(x), left(NULL), right(NULL) {}
};

// LeetCode(257)
class Solution {
public:
    vector<string> binaryTreePaths(TreeNode* root) {
        vector<string> res;

        if (root == NULL)
            return res;

        if (root->left == NULL && root->right == NULL) {
            res.push_back(to_string(root->val));
            return res;
        }

        vector<string> left = binaryTreePaths(root->left);
        for (int i = 0; i < left.size(); i++)
            res.push_back(to_string(root->val) + "->" + left[i]);

        vector<string> right = binaryTreePaths(root->right);
        for (int i = 0; i < right.size(); i++)
            res.push_back(to_string(root->val) + "->" + right[i]);

        return res;
    }
};

int main() {

    return 0;
}