#define _CRT_SECURE_NO_WARNINGS
#include <stdlib.h>
#include <string.h>
#include <stdio.h>

typedef struct Line
{
          struct Line *prev; // 指向直接前驱
          int data;          // 数据域
          struct Line *next; // 指向直接后继
} line;

// 创建双向链表
line *initDoubleLink(line *head);
// 在双向链表指定位置插入元素
line *insertDoubleLink(line *p, int elem, int add);
// 在双向链表中删除指定元素
line *delDoubleElem(line *head, int data);
// 在双向链表中删除指定位置的元素
line *delDoublePosElem(line *p, int pos);
// 在双向链表中查找指定元素
int selectDoubleElem(line *head, int elem);
// 展示链表
void displayDoubleLink(line *head);

int main5()
{
          // 创建头指针
          line *head = NULL;

          // 创建双链表
          head = initDoubleLink(head);
          displayDoubleLink(head);

          // 在表中第 3 的位置插入元素 7
          head = insertDoubleLink(head, 7, 3);
          displayDoubleLink(head);

          // 表中删除元素 2
          head = delDoubleElem(head, 2);
          displayDoubleLink(head);

          // 删除位置为2的元素
          head = delDoublePosElem(head, 2);
          displayDoubleLink(head);

          printf("元素 3 的位置是：%d\n", selectDoubleElem(head, 3));

          return 0;
}

line *initDoubleLink(line *head)
{
          head = (line *)malloc(sizeof(line));
          head->data = 1;
          head->prev = NULL;
          head->next = NULL;
          line *list = head;

          for (int i = 2; i <= 5; i++)
          {
                    // 创建并初始化一个新结点
                    line *body = (line *)malloc(sizeof(line));
                    body->data = i;
                    body->prev = NULL;
                    body->next = NULL;

                    list->next = body; // 直接前趋结点的next指针指向新结点
                    body->prev = list; // 新结点指向直接前趋结点
                    list = list->next;
          }

          return head;
}

line *insertDoubleLink(line *head, int data, int add)
{
          // 新建数据域为data的结点
          line *temp = (line *)malloc(sizeof(line));
          temp->data = data;
          temp->prev = NULL;
          temp->next = NULL;

          // 插入到链表头，要特殊考虑
          if (add == 1)
          {
                    temp->next = head;
                    head->prev = temp;
                    head = temp;
          }
          else
          {
                    line *body = head;
                    // 找到要插入位置的前一个结点，为插入结点做准备
                    for (int i = 1; i < add - 1; i++)
                    {
                              body = body->next;
                    }
                    // 判断条件为真，说明插入位置为链表尾
                    if (body->next == NULL)
                    {
                              body->next = temp;
                              temp->prev = body;
                    }
                    else
                    {
                              temp->next = body->next;
                              body->next->prev = temp;
                              body->next = temp;
                              temp->prev = body;
                    }
          }

          return head;
}

line *delDoubleElem(line *head, int data)
{
          line *temp = head;

          while (temp)
          {
                    // 判断是否为首元节点
                    if (head->data == data)
                    {
                              head = temp->next;
                              free(temp);
                              return head;
                    }
                    // 判断当前结点中数据域和data是否相等，若相等，摘除该结点
                    if (temp->data == data)
                    {
                              temp->prev->next = temp->next;
                              temp->next->prev = temp->prev;
                              free(temp);
                              return head;
                    }
                    temp = temp->next;
          }

          printf("链表中无该数据元素");
          return head;
}

line *delDoublePosElem(line *head, int pos)
{
          line *temp = head;

          for (int i = 1; i < pos - 1; i++)
          {
                    temp = temp->next;
          }

          line *elem = temp->next;
          temp->next = elem->next;
          elem->next->prev = temp;
          free(elem);
          elem = NULL;

          return head;
}

int selectDoubleElem(line *head, int elem)
{
          line *t = head;
          int i = 1;
          while (t)
          {
                    if (t->data == elem)
                    {
                              return i;
                    }
                    i++;
                    t = t->next;
          }
          //程序执行至此处，表示查找失败
          return -1;
}

void displayDoubleLink(line *head)
{
          line *temp = head;
          while (temp)
          {
                    if (temp->next == NULL)
                    {
                              printf("%d\n", temp->data);
                    }
                    else
                    {
                              printf("%d <-> ", temp->data);
                    }
                    temp = temp->next;
          }
}
