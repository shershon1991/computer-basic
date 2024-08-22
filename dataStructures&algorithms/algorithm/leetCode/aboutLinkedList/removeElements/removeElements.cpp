#include <iostream>

using namespace std;

struct ListNode
{
          int val;
          ListNode *next;
          ListNode(int x) : val(x), next(NULL) {}
};

// Leetcode-203
class Solution
{
public:
          ListNode *removeElements(ListNode *head, int val)
          {
                    while (head != NULL && head->val == val)
                    {
                              ListNode *delNode = head;
                              head = head->next;
                              delete delNode;
                    }

                    if (head == NULL)
                              return NULL;

                    ListNode *cur = head;
                    while (cur->next != NULL)
                    {
                              if (cur->next->val == val)
                              {
                                        ListNode *delNode = cur->next;
                                        cur->next = delNode->next;
                                        delete delNode;
                              }
                              else
                                        cur = cur->next;
                    }

                    return head;
          }

          // 使用虚拟头结点
          ListNode *removeElements2(ListNode *head, int val)
          {
                    ListNode *dummyNode = new ListNode(0);
                    dummyNode->next = head;

                    ListNode *cur = dummyNode;
                    while (cur->next != NULL)
                    {
                              if (cur->next->val == val)
                              {
                                        ListNode *delNode = cur->next;
                                        cur->next = delNode->next;
                                        delete delNode;
                              }
                              else
                                        cur = cur->next;
                    }

                    ListNode *retNode = dummyNode->next;
                    delete dummyNode;

                    return retNode;
          }
};

int main()
{
          return 0;
}