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

// 选择排序-简单选择排序
/*
选择排序（Selection Sort）是一种简单直观的排序算法。它的工作原理如下，首先在未排序序列中找到最小（大）元素，
存放到排序序列的起始位置，然后，再从剩余未排序元素中继续寻找最小（大）元素，然后放到已排序序列的末尾。以此类推，
直到所有元素均排序完毕。
*/
int main()
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