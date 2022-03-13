#include <iostream>
#include <cassert>

using namespace std;

// Definition for singly-linked list.
struct ListNode
{
          int val;
          ListNode *next;
          ListNode(int x) : val(x), next(NULL) {}
};

// Leetcode-19
class Solution
{
public:
          ListNode *removeNthFromEnd(ListNode *head, int n)
          {
                    assert(n > 0);

                    ListNode *dummyNode = new ListNode(0);
                    dummyNode->next = head;

                    ListNode *p = dummyNode;
                    ListNode *q = dummyNode;

                    for (int i = 0; i < n + 1; i++)
                    {
                              assert(q);
                              q = q->next;
                    }

                    while (q != NULL)
                    {
                              p = p->next;
                              q = q->next;
                    }

                    ListNode *delNode = p->next;
                    p->next = delNode->next;
                    delete delNode;

                    ListNode *retNode = dummyNode->next;
                    delete dummyNode;

                    return retNode;
          }
};

int main()
{

          return 0;
}