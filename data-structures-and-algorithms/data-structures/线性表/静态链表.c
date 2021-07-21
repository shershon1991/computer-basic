#define _CRT_SECURE_NO_WARNINGS
#include <stdio.h>
#include <stdlib.h>

#define maxSize 7
typedef struct
{
          char data;
          int cur;
} component;

//将结构体数组中所有分量链接到备用链表中
void reserveArr(component *array);
//初始化静态链表
int initArr(component *array);
//向链表中插入数据，body表示链表的头结点在数组中的位置，add表示插入元素的位置，a表示要插入的数据
void insertArr(component *array, int body, int add, char a);
//删除链表中含有字符a的结点
void deletArr(component *array, int body, char a);
//查找存储有字符elem的结点在数组的位置
int selectElem(component *array, int body, char elem);
//将链表中的字符oldElem改为newElem
void amendElem(component *array, int body, char oldElem, char newElem);
//输出函数
void displayArr(component *array, int body);
//从备用链表中摘除空闲节点的实现函数
int mallocArr(component *array);
//将摘除下来的节点链接到备用链表上
void freeArr(component *array, int k);

int main3()
{
          component array[maxSize];
          int body = initArr(array);
          printf("静态链表为：\n");
          displayArr(array, body);

          printf("在第3的位置上插入结点‘e’:\n");
          insertArr(array, body, 3, 'e');
          displayArr(array, body);

          printf("删除数据域为‘a’的结点:\n");
          deletArr(array, body, 'a');
          displayArr(array, body);

          printf("查找数据域为‘e’的结点的位置:\n");
          int selectAdd = selectElem(array, body, 'e');
          printf("%d\n", selectAdd);

          printf("将结点数据域为‘e’改为‘h’:\n");
          amendElem(array, body, 'e', 'h');
          displayArr(array, body);

          return 0;
}

//创建备用链表
void reserveArr(component *array)
{
          for (int i = 0; i < maxSize; i++)
          {
                    array[i].cur = i + 1; //将每个数组分量链接到一起
          }
          array[maxSize - 1].cur = 0; //链表最后一个结点的游标值为0
}
//初始化静态链表
int initArr(component *array)
{
          reserveArr(array);
          int body = mallocArr(array);
          //声明一个变量，把它当指针使，指向链表的最后的一个结点，因为链表为空，所以和头结点重合
          int tempBody = body;
          for (int i = 1; i < 5; i++)
          {
                    int j = mallocArr(array);    //从备用链表中拿出空闲的分量
                    array[tempBody].cur = j;     //将申请的空闲分量链接在链表的最后一个结点后面
                    array[j].data = 'a' + i - 1; //给新申请的分量的数据域初始化
                    tempBody = j;                //将指向链表最后一个结点的指针后移
          }
          array[tempBody].cur = 0; //新的链表最后一个结点的指针设置为0
          return body;
}
void insertArr(component *array, int body, int add, char a)
{
          int tempBody = body;
          for (int i = 1; i < add; i++)
          {
                    tempBody = array[tempBody].cur;
          }
          int insert = mallocArr(array);
          array[insert].cur = array[tempBody].cur;
          array[insert].data = a;
          array[tempBody].cur = insert;
}
void deletArr(component *array, int body, char a)
{
          int tempBody = body;
          //找到被删除结点的位置
          while (array[tempBody].data != a)
          {
                    tempBody = array[tempBody].cur;
                    //当tempBody为0时，表示链表遍历结束，说明链表中没有存储该数据的结点
                    if (tempBody == 0)
                    {
                              printf("链表中没有此数据");
                              return;
                    }
          }
          //运行到此，证明有该结点
          int del = tempBody;
          tempBody = body;
          //找到该结点的上一个结点，做删除操作
          while (array[tempBody].cur != del)
          {
                    tempBody = array[tempBody].cur;
          }
          //将被删除结点的游标直接给被删除结点的上一个结点
          array[tempBody].cur = array[del].cur;

          freeArr(array, del);
}
int selectElem(component *array, int body, char elem)
{
          int tempBody = body;
          //当游标值为0时，表示链表结束
          while (array[tempBody].cur != 0)
          {
                    if (array[tempBody].data == elem)
                    {
                              return tempBody;
                    }
                    tempBody = array[tempBody].cur;
          }
          return -1; //返回-1，表示在链表中没有找到该元素
}
void amendElem(component *array, int body, char oldElem, char newElem)
{
          int add = selectElem(array, body, oldElem);
          if (add == -1)
          {
                    printf("无更改元素");
                    return;
          }
          array[add].data = newElem;
}
void displayArr(component *array, int body)
{
          int tempBody = body; //tempBody准备做遍历使用
          while (array[tempBody].cur)
          {
                    printf("%c,%d ", array[tempBody].data, array[tempBody].cur);
                    tempBody = array[tempBody].cur;
          }
          printf("%c,%d\n", array[tempBody].data, array[tempBody].cur);
}
//提取分配空间
int mallocArr(component *array)
{
          //若备用链表非空，则返回分配的结点下标，否则返回0（当分配最后一个结点时，该结点的游标值为0）
          int i = array[0].cur;
          if (array[0].cur)
          {
                    array[0].cur = array[i].cur;
          }
          return i;
}
//将摘除下来的节点链接到备用链表上
void freeArr(component *array, int k)
{
          array[k].cur = array[0].cur;
          array[0].cur = k;
}