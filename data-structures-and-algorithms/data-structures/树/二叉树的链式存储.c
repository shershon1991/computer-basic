#define _CRT_SECURE_NO_WARNINGS
#include <stdlib.h>
#include <string.h>
#include <stdio.h>

#define TElemType int

typedef struct BiTNode
{
          TElemType data;                  // 数据域
          struct BiTNode *lchild, *rchild; // 左右孩子指针
} BiTNode, *BiTree;

void CreateBiTree(BiTree *T);

int main()
{
          BiTree Tree;
          CreateBiTree(&Tree);
          printf("%d\n", Tree->lchild->data);

          return 0;
}

// 创建二叉树
void CreateBiTree(BiTree *T)
{
          *T = (BiTNode *)malloc(sizeof(BiTNode));
          (*T)->data = 1;
          (*T)->lchild = (BiTNode *)malloc(sizeof(BiTNode));
          (*T)->lchild->data = 2;
          (*T)->rchild = (BiTNode *)malloc(sizeof(BiTNode));
          (*T)->rchild->data = 3;
          (*T)->rchild->lchild = NULL;
          (*T)->rchild->rchild = NULL;
          (*T)->lchild->lchild = (BiTNode *)malloc(sizeof(BiTNode));
          (*T)->lchild->lchild->data = 4;
          (*T)->lchild->rchild = NULL;
          (*T)->lchild->lchild->lchild = NULL;
          (*T)->lchild->lchild->rchild = NULL;
}