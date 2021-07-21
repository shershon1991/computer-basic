#define _CRT_SECURE_NO_WARNINGS
#include <stdlib.h>
#include <string.h>
#include <stdio.h>

// 链表中节点的结构
typedef struct Link
{
          int elem;          // 代表数据域
          struct Link *next; // 代表指针域，指向直接后继元素
} link;                      // link为节点名，每个节点都是一个 link 结构体

// 创建链表
link *initLink();
// 在链表指定位置插入元素
link *insertLink(link *p, int elem, int add);
// 在链表指定位置删除元素
link *delElem(link *p, int del);
// 在链表指定位置查找元素
int findElem(link *p, int pos);
// 在链表中查找指定元素的位置
int selectElem2(link *p, int elem);
// 展示链表
void displayLink(link *p);

int main2()
{
          // 初始化链表（1，2，3，4）
          printf("初始化链表为：\n");
          link *p = initLink();
          displayLink(p);

          printf("在第4的位置插入元素5：\n");
          p = insertLink(p, 5, 4);
          displayLink(p);

          printf("删除位置为3的元素:\n");
          p = delElem(p, 3);
          displayLink(p);

          printf("查找位置为3的元素：\n");
          int res = findElem(p, 3);
          printf("位置为3的元素是：%d\n", res);

          printf("查找元素为2的位置：\n");
          int address = selectElem2(p, 2);
          if (address == -1)
          {
                    printf("没有该元素");
          }
          else
          {
                    printf("元素为2的位置：%d\n", address);
          }

          return 0;
}

link *initLink()
{
          link *p = NULL;   // 创建头指针
          link *tmp = NULL; // 创建首元节点

          tmp = (link *)malloc(sizeof(link));
          // 首元节点先初始化
          tmp->elem = 1;
          tmp->next = NULL;
          p = tmp; // 头指针指向首元节点

          // 从第二个节点开始创建
          for (int i = 2; i < 5; i++)
          {
                    // 创建一个新节点并初始化
                    link *a = (link *)malloc(sizeof(link));
                    a->elem = i;
                    a->next = NULL;
                    // 将tmp节点与新建立的a节点建立逻辑关系
                    tmp->next = a;
                    // 指针temp每次都指向新链表的最后一个节点，其实就是 a节点，这里写temp=a也对
                    tmp = tmp->next;
          }

          // 返回建立的节点，只返回头指针 p即可，通过头指针即可找到整个链表
          return p;
}

link *insertLink(link *p, int elem, int add)
{
          link *temp = p; //创建临时指针temp

          // 首先找到要插入位置的上一个结点
          for (int i = 1; i < add - 1; i++)
          {
                    if (temp == NULL)
                    {
                              printf("插入位置无效\n");
                              return p;
                    }
                    temp = temp->next;
          }

          // 创建插入结点c
          link *c = (link *)malloc(sizeof(link));
          c->elem = elem;

          // 向链表中插入结点
          c->next = temp->next;
          temp->next = c;

          return p;
}

link *delElem(link *p, int del)
{
          link *temp = p;

          // temp指向被删除结点的上一个结点
          for (int i = 1; i < del - 1; i++)
          {
                    temp = temp->next;
          }
          link *elem = temp->next; // 单独设置一个指针指向被删除结点，以防丢失
          temp->next = elem->next; // 删除某个结点的方法就是更改前一个结点的指针域

          free(elem); // 手动释放该结点，防止内存泄漏
          elem = NULL;

          return p;
}

int findElem(link *p, int pos)
{
          link *temp = p;

          for (int i = 0; i < pos - 1; i++)
          {
                    temp = temp->next;
          }

          return temp->elem;
}

int selectElem2(link *p, int elem)
{
          link *t = p;

          int i = 1;
          while (t)
          {
                    if (t->elem == elem)
                    {
                              return i;
                    }
                    t = t->next;
                    i++;
          }

          // 程序执行至此处，表示查找失败
          return -1;
}

void displayLink(link *p)
{
          link *tmp = p; // 将temp指针重新指向头结点

          // 只要temp指针指向的结点的next不是Null，就执行输出语句。
          while (tmp)
          {
                    printf("%d ", tmp->elem);
                    tmp = tmp->next;
          }
          printf("\n");
}