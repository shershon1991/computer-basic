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
void CreateBiTree6(BiTree *T);

void displayElem6(BiTNode *elem);

// 后序遍历
void PostOrderTraverse(BiTree T);

int main401()
{
          BiTree Tree;
          CreateBiTree6(&Tree);
          printf("中序遍历算法：\n");
          PostOrderTraverse(Tree);
          printf("\n");

          return 0;
}

void CreateBiTree6(BiTree *T)
{
          *T = (BiTNode *)malloc(sizeof(BiTNode));
          (*T)->data = 1;
          (*T)->lchild = (BiTNode *)malloc(sizeof(BiTNode));
          (*T)->rchild = (BiTNode *)malloc(sizeof(BiTNode));

          (*T)->lchild->data = 2;
          (*T)->lchild->lchild = (BiTNode *)malloc(sizeof(BiTNode));
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
          (*T)->lchild->lchild->data = 4;
          (*T)->lchild->lchild->lchild = NULL;
          (*T)->lchild->lchild->rchild = NULL;
}

void displayElem6(BiTNode *elem)
{
          printf("%d ", elem->data);
}

void PostOrderTraverse(BiTree T)
{
          if (T)
          {
                    PostOrderTraverse(T->lchild); // 遍历左孩子
                    PostOrderTraverse(T->rchild); // 遍历右孩子
                    displayElem6(T);
          }
          // 若结点为空，返回上一层
          return;
}