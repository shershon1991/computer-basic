#include <stdio.h>
#include <stdlib.h>

#define MAX 9

//单个记录的结构体
typedef struct
{
          int key;
} SqNote;

//记录表的结构体
typedef struct
{
          SqNote r[MAX];
          int length;
} SqList;

//交换两个记录的位置
void swap2(SqNote *a, SqNote *b)
{
          int key = a->key;
          a->key = b->key;
          b->key = key;
}

//查找表中关键字的最小值
int SelectMinKey(SqList *L, int i)
{
          int min = i;
          //从下标为 i+1 开始，一直遍历至最后一个关键字，找到最小值所在的位置
          while (i + 1 < L->length)
          {
                    if (L->r[min].key > L->r[i + 1].key)
                    {
                              min = i + 1;
                    }
                    i++;
          }
          return min;
}

//简单选择排序算法实现函数
void SelectSort(SqList *L)
{
          for (int i = 0; i < L->length; i++)
          {
                    //查找第 i 的位置所要放置的最小值的位置
                    int j = SelectMinKey(L, i);
                    //如果 j 和 i 不相等，说明最小值不在下标为 i 的位置，需要交换
                    if (i != j)
                    {
                              swap2(&(L->r[i]), &(L->r[j]));
                    }
          }
}

int main5()
{
          SqList *L = (SqList *)malloc(sizeof(SqList));
          L->length = 8;
          L->r[0].key = 49;
          L->r[1].key = 38;
          L->r[2].key = 65;
          L->r[3].key = 97;
          L->r[4].key = 76;
          L->r[5].key = 13;
          L->r[6].key = 27;
          L->r[7].key = 49;
          SelectSort(L);
          for (int i = 0; i < L->length; i++)
          {
                    printf("%d ", L->r[i].key);
          }

          return 0;
}