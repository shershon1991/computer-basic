#define _CRT_SECURE_NO_WARNINGS
#include <stdlib.h>
#include <string.h>
#include <stdio.h>

#define linkNum 3 // 全局设置链表中节点存储数据的个数

typedef struct Link
{
    char a[linkNum]; // 数据域可存放 linkNum 个数据
    struct Link *next;
} link;

// 初始化链表
// 其中head为头指针，str为存储的字符串
link *initLink(link *head, char *str);
// 展示链表
void displayLink(link *head);

// 块链存储
int main()
{
    link *head = NULL;
    head = initLink(head, "data.biancheng.net");
    displayLink(head);

    return 0;
}

link *initLink(link *head, char *str)
{
    int length = strlen(str);
    // 根据字符串的长度，计算出链表中使用节点的个数
    int num = length / linkNum;
    if (length % linkNum)
    {
        num++;
    }
    // 创建并初始化首元结点
    head = (link *)malloc(sizeof(link));
    head->next = NULL;
    link *temp = head;
    // 初始化链表
    for (int i = 0; i < num; i++)
    {
        int j = 0;
        for (; j < linkNum; j++)
        {
            if (i * linkNum + j < length)
            {
                temp->a[j] = str[i * linkNum + j];
            }
            else
                temp->a[j] = '#';
        }
        if (i * linkNum + j < length)
        {
            link *newlink = (link *)malloc(sizeof(link));
            newlink->next = NULL;
            temp->next = newlink;
            temp = newlink;
        }
    }
    return head;
}

void displayLink(link *head)
{
    link *temp = head;
    while (temp)
    {
        for (int i = 0; i < linkNum; i++)
        {
            printf("%c", temp->a[i]);
        }
        temp = temp->next;
    }
    printf("\n");
}