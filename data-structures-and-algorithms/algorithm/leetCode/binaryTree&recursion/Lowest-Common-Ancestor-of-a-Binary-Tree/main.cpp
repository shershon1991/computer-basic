#include <iostream>
#include <cassert>

using namespace std;

//Definition for a binary tree node.
struct TreeNode {
    int val;
    TreeNode *left;
    TreeNode *right;
    TreeNode(int x) : val(x), left(NULL), right(NULL) {}
};

// LeetCode(236)
class Solution {
public:
    TreeNode* lowestCommonAncestor(TreeNode* root, TreeNode* p, TreeNode* q) {
        assert(p != NULL && q != NULL);

        if (root == NULL)
            return NULL;

        if (p->val < root->val && q->val < root->val)
            return lowestCommonAncestor(root->left, p, q);
        if (p->val > root->val && q->val > root->val)
            return lowestCommonAncestor(root->right, p, q);

        return root;
    }
};

int main() {

    return 0;
}