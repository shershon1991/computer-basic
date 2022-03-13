#include <iostream>
#include <vector>
#include <stack>
#include <cassert>

using namespace std;

struct TreeNode
{
    int val;
    TreeNode *left;
    TreeNode *right;
    TreeNode(int x) : val(x), left(NULL), right(NULL) {}
};

struct Command
{
    string s;
    TreeNode *node;
    Command(string s, TreeNode *node) : s(s), node(node) {}
};

class Solution
{
public: // 非递归方式前序遍历
    vector<int> preorderTraversal(TreeNode *root)
    {
        vector<int> res;
        if (root == NULL)
            return res;

        stack<Command> stack;
        stack.push(Command("go", root));
        while (!stack.empty())
        {
            Command command = stack.top();
            stack.pop();

            if (command.s == "print")
                res.push_back(command.node->val);
            else
            {
                assert(command.s == "go");
                if (command.node->right)
                    stack.push(Command("go", command.node->right));
                if (command.node->left)
                    stack.push(Command("go", command.node->left));
                stack.push(Command("print", command.node));
            }
        }

        return res;
    }

public: // 非递归方式中序遍历
    vector<int> inorderTraversal(TreeNode *root)
    {
        vector<int> res;
        if (root == NULL)
            return res;

        stack<Command> stack;
        stack.push(Command("go", root));
        while (!stack.empty())
        {
            Command command = stack.top();
            stack.pop();

            if (command.s == "print")
                res.push_back(command.node->val);
            else
            {
                assert(command.s == "go");
                if (command.node->right)
                    stack.push(Command("go", command.node->right));
                stack.push(Command("print", command.node));
                if (command.node->left)
                    stack.push(Command("go", command.node->left));
            }
        }

        return res;
    }

public: // 非递归方式后序遍历
    vector<int> postorderTraversal(TreeNode *root)
    {
        vector<int> res;
        if (root == NULL)
            return res;

        stack<Command> stack;
        stack.push(Command("go", root));
        while (!stack.empty())
        {
            Command command = stack.top();
            stack.pop();

            if (command.s == "print")
                res.push_back(command.node->val);
            else
            {
                assert(command.s == "go");
                stack.push(Command("print", command.node));
                if (command.node->right)
                    stack.push(Command("go", command.node->right));
                if (command.node->left)
                    stack.push(Command("go", command.node->left));
            }
        }

        return res;
    }
};

int main()
{

    return 0;
}