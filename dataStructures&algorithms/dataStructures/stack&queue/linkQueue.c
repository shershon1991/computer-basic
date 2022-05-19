#define _CRT_SECURE_NO_WARNINGS
#include <stdlib.h>
#include <string.h>
#include <stdio.h>

typedef struct QNode
{
    int data;
    struct QNode *next;
} QNode;

// 创建链式队列
QNode *initQueue();
// 入队
QNode *enQueue(QNode *rear, int data);
// 出队
QNode *deQueue(QNode *top, QNode *rear);

int main()
{
    QNode *queue, *top, *rear;
    queue = top = rear = initQueue(); // 创建头节点

    // 向链队列中添加结点，使用尾插法添加的同时，队尾指针需要指向链表的最后一个元素
    rear = enQueue(rear, 1);
    rear = enQueue(rear, 2);
    rear = enQueue(rear, 3);
    rear = enQueue(rear, 4);
    // 入队完成，所有数据元素开始出队列
    rear = deQueue(top, rear);
    rear = deQueue(top, rear);
    rear = deQueue(top, rear);
    rear = deQueue(top, rear);
    rear = deQueue(top, rear);

    return 0;
}

QNode *initQueue()
{
    // 创建一个头结点
    QNode *queue = (QNode *)malloc(sizeof(QNode));
    // 对头结点进行初始化
    queue->next = NULL;
    return queue;
}

QNode *enQueue(QNode *rear, int data)
{
    printf("入队元素：%d\n", data);
    // 1、用节点包裹入队元素
    QNode *enElem = (QNode *)malloc(sizeof(QNode));
    enElem->data = data;
    enElem->next = NULL;
    // 2、新节点与rear节点建立逻辑关系
    rear->next = enElem;
    // 3、rear指向新节点
    rear = enElem;
    // 返回新的rear，为后续新元素入队做好准备
    return rear;
}

QNode *deQueue(QNode *top, QNode *rear)
{
    if (top->next == NULL)
    {
        printf("队列为空\n");
        return rear;
    }
    QNode *p = top->next;
    printf("出队元素：%d\n", p->data);
    top->next = p->next;
    if (rear == p)
    {
        rear = top;
    }
    free(p);
    return rear;
}