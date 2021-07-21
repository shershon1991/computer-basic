#define _CRT_SECURE_NO_WARNINGS
#include <stdlib.h>
#include <stdio.h>

#define Size 5 // 对Size进行宏定义，表示顺序表申请空间的大小

typedef struct Table
{
          int *head;  // 声明了一个名为head的长度不确定的数组，也叫“动态数组”
          int length; // 长度
          int size;   // 容量
} table;

// 创建顺序表
table initTable();
// 在顺序表指定位置插入元素
table addTable(table t, int elem, int add);
// 在顺序表指定位置删除元素
table delTable(table t, int del);
// 获取顺序表指定位置元素
int getPosTable(table t, int pos);
// 在顺序表中查找指定元素的位置
int selectTable(table t, int elem);
// 展示链表
void displayTable(table t);

int main1()
{
          table t = initTable();

          // 向顺序表中添加元素
          for (int i = 1; i <= Size; i++)
          {
                    t.head[i - 1] = i;
                    t.length++;
          }
          printf("原顺序表：\n");
          displayTable(t);

          printf("在位置2插入元素5： \n");
          t = addTable(t, 5, 2);
          displayTable(t);

          printf("删除位置为1的元素：\n");
          t = delTable(t, 1);
          displayTable(t);

          printf("获取位置为4的元素：\n");
          int get = getPosTable(t, 4);
          printf("%d\n", get);

          printf("查找元素为3的位置：\n");
          int select = selectTable(t, 3);
          printf("%d\n", select);

          return 0;
}

table initTable()
{
          table t;
          t.head = (int *)malloc(Size * sizeof(int)); // 构造一个空的顺序表，动态申请存储空间
          if (!t.head)
          { // 如果申请失败，作出提示并直接退出程序
                    printf("初始化失败");
                    exit(0);
          }
          t.length = 0;  // 空表的长度初始化为0
          t.size = Size; // 空表的初始存储空间为Size
          return t;
}

table addTable(table t, int elem, int add)
{
          // 判断插入本身是否存在问题（如果插入元素位置比整张表的长度+1还大（如果相等，是尾随的情况），
          // 或者插入的位置本身不存在，程序作出提示并自动退出）
          if (add > t.length + 1 || add < 1)
          {
                    printf("位置有问题\n");
                    return t;
          }

          // 做插入操作时，首先需要看顺序表是否有多余的存储空间提供给插入的元素，如果没有，需要申请
          if (t.length == t.size)
          {
                    t.head = (int *)realloc(t.head, (t.size + 1) * sizeof(int));
                    if (!t.head)
                    {
                              printf("空间分配失败\n");
                              return t;
                    }
                    t.size++;
          }

          // 插入操作，需要将从插入位置开始的后续元素，逐个后移
          for (int i = t.length - 1; i >= add - 1; i--)
          {
                    t.head[i + 1] = t.head[i];
          }

          // 后移完成后，直接将所需插入元素，添加到顺序表的相应位置
          t.head[add - 1] = elem;
          // 由于添加了元素，所以长度+1
          t.length++;
          return t;
}

table delTable(table t, int del)
{
          if (del > t.length || del < 1)
          {
                    printf("被删除元素的位置有误");
                    return t;
          }
          // 删除操作
          for (int i = del; i < t.length; i++)
          {
                    t.head[i - 1] = t.head[i];
          }
          t.length--;
          return t;
}

int getPosTable(table t, int pos)
{
          if (pos > t.length || pos < 1)
          {
                    printf("获取元素的位置有误");
                    return -1;
          }
          return t.head[pos - 1];
}

int selectTable(table t, int elem)
{
          for (int i = 0; i < t.length; i++)
          {
                    if (t.head[i] == elem)
                    {
                              return i + 1;
                    }
          }
          return -1; // 查找失败
}

void displayTable(table t)
{
          for (int i = 0; i < t.length; i++)
          {
                    printf("%d ", t.head[i]);
          }
          printf("\n");
}
