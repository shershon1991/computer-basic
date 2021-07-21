#define _CRT_SECURE_NO_WARNINGS
#include <stdlib.h>
#include <string.h>
#include <stdio.h>

#define Max 6 // 表示顺序表申请的空间大小

// 入队
int enSeqQueue(int *a, int front, int rear, int data);
// 出队
int deSeqQueue(int *a, int front, int rear);

int main3()
{
          int a[Max];
          int front, rear;
          // 设置队头指针和队尾指针，当队列中没有元素时，队头和队尾指向同一块地址
          front = rear = 0;

          // 入队
          rear = enSeqQueue(a, front, rear, 1);
          rear = enSeqQueue(a, front, rear, 2);
          rear = enSeqQueue(a, front, rear, 3);
          rear = enSeqQueue(a, front, rear, 4);
          rear = enSeqQueue(a, front, rear, 5);
          // 出队
          front = deSeqQueue(a, front, rear);
          //再入队
          rear = enSeqQueue(a, front, rear, 6);
          //再出队
          front = deSeqQueue(a, front, rear);
          //再入队
          rear = enSeqQueue(a, front, rear, 7);
          // 再出队
          front = deSeqQueue(a, front, rear);
          front = deSeqQueue(a, front, rear);
          front = deSeqQueue(a, front, rear);
          front = deSeqQueue(a, front, rear);
          front = deSeqQueue(a, front, rear);
          front = deSeqQueue(a, front, rear);

          return 0;
}

int enSeqQueue(int *a, int front, int rear, int data)
{
          // 添加判断语句，如果rear超过max，则直接将其从a[0]重新开始存储，如果rear+1和front重合，则表示数组已满
          if ((rear + 1) % Max == front)
          {
                    printf("空间已满\n");
                    return rear;
          }
          a[rear % Max] = data;
          rear++;
          return rear;
}

int deSeqQueue(int *a, int front, int rear)
{
          // 如果 front==rear，表示队列为空
          if (front == rear % Max)
          {
                    printf("队列为空");
                    return front;
          }
          printf("出队元素：%d\n", a[front]);
          // front不再直接 +1，而是+1后同max进行比较，如果=max，则直接跳转到 a[0]
          front = (front + 1) % Max;
          return front;
}
