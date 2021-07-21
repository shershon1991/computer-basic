#define _CRT_SECURE_NO_WARNINGS
#include <stdlib.h>
#include <string.h>
#include <stdio.h>

typedef struct linkStack
{
          int data;
          struct linkStack *next;
} linkStack;

// 入栈
// stack为当前的链栈，a表示入栈元素
linkStack *linkStackPush(linkStack *stack, int a);

// 出栈
linkStack *linkStackPop(linkStack *stack);

// 展示栈
void displayLinkStack(linkStack *stack);

int main2()
{
          linkStack *stack = NULL;
          stack = linkStackPush(stack, 1);
          stack = linkStackPush(stack, 2);
          stack = linkStackPush(stack, 3);
          stack = linkStackPush(stack, 4);
          displayLinkStack(stack);
          stack = linkStackPop(stack);
          stack = linkStackPop(stack);
          stack = linkStackPop(stack);
          stack = linkStackPop(stack);
          stack = linkStackPop(stack);

          return 0;
}

linkStack *linkStackPush(linkStack *stack, int a)
{
          // 创建存储新元素的节点
          linkStack *node = (linkStack *)malloc(sizeof(linkStack));
          node->data = a;

          // 新节点与头节点建立逻辑关系
          node->next = stack;

          // 更新头指针的指向
          stack = node;

          return stack;
}

linkStack *linkStackPop(linkStack *stack)
{
          if (stack)
          {
                    // 声明一个新指针指向栈顶节点
                    linkStack *p = stack;

                    // 更新头指针
                    stack = stack->next;
                    printf("出栈元素为：%d ", p->data);

                    if (stack)
                    {
                              printf("新栈顶元素：%d\n", stack->data);
                    }
                    else
                    {
                              printf("栈已空\n");
                    }
                    free(p);
          }
          else
          {
                    printf("栈内没有元素\n");
                    return stack;
          }
          return stack;
}

void displayLinkStack(linkStack *stack)
{
          while (stack)
          {
                    printf("%d ", stack->data);
                    stack = stack->next;
          }
          printf("\n");
}