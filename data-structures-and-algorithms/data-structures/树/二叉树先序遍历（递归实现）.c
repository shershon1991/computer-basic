#define _CRT_SECURE_NO_WARNINGS
#include <stdlib.h>
#include <string.h>
#include <stdio.h>

#define TElemType int

// 构造结点的结构体
typedef struct BiTNode
{
          TElemType data;                  // 数据域
          struct BiTNode *lchild, *rchild; // 左右孩子指针
} BiTNode, *BiTree;

// 创建树
void CreateBiTree2(BiTree *T);

// 模拟操作结点元素的函数，输出结点本身的数值
void displayElem2(BiTNode *elem);

// 先序遍历
void PreOrderTraverse2(BiTree T);

int main201()
{
          BiTree Tree;
          CreateBiTree2(&Tree);
          printf("先序遍历：\n");
          PreOrderTraverse2(Tree);
          printf("\n");

          return 0;
}

void CreateBiTree2(BiTree *T)
{
          *T = (BiTNode *)malloc(sizeof(BiTNode));
          (*T)->data = 1;
          (*T)->lchild = (BiTNode *)malloc(sizeof(BiTNode));
          (*T)->rchild = (BiTNode *)malloc(sizeof(BiTNode));

          (*T)->lchild->data = 2;
          (*T)->lchild->lchild = (BiTNode *)malloc(sizeof(BiTNode));
          (*T)->lchild->lchild->data = 4;
          (*T)->lchild->lchild->lchild = NULL;
          (*T)->lchild->lchild->rchild = NULL;

          (*T)->lchild->rchild = (BiTNode *)malloc(sizeof(BiTNode));
          (*T)->lchild->rchild->data = 5;
          (*T)->lchild->rchild->lchild = NULL;
          (*T)->lchild->rchild->rchild = NULL;

          (*T)->rchild->data = 3;
          (*T)->rchild->lchild = (BiTNode *)malloc(sizeof(BiTNode));
          (*T)->rchild->lchild->data = 6;
          (*T)->rchild->lchild->lchild = NULL;
          (*T)->rchild->lchild->rchild = NULL;

          (*T)->rchild->rchild = (BiTNode *)malloc(sizeof(BiTNode));
          (*T)->rchild->rchild->data = 7;
          (*T)->rchild->rchild->lchild = NULL;
          (*T)->rchild->rchild->rchild = NULL;
}

void displayElem2(BiTNode *elem)
{
          printf("%d ", elem->data);
}

void PreOrderTraverse2(BiTree T)
{
          if (T)
          {
                    displayElem2(T);              // 调用操作结点数据的函数方法
                    PreOrderTraverse2(T->lchild); // 访问该节点的左孩子
                    PreOrderTraverse2(T->rchild); // 访问该节点的右孩子
          }
          // 若结点为空，返回上一层
          return;
}
