#define _CRT_SECURE_NO_WARNINGS
#include <stdlib.h>
#include <string.h>
#include <stdio.h>

#define TElemType int
int top = -1; // top变量时刻表示栈顶元素所在位置

//构造结点的结构体
typedef struct BiTNode
{
    TElemType data;                  //数据域
    struct BiTNode *lchild, *rchild; //左右孩子指针
} BiTNode, *BiTree;

// 创建二叉树
void CreateBiTree3(BiTree *T);

// 先序遍历使用的进栈函数
void push3(BiTNode **a, BiTNode *elem);

// 弹栈函数
void pop3();

// 模拟操作结点元素的函数，输出结点本身的数值
void displayElem3(BiTNode *elem);

// 拿到栈顶元素
BiTNode *getTop(BiTNode **a);

// 先序遍历非递归算法
void PreOrderTraverse3(BiTree Tree);

// 二叉树先序遍历（非递归）
int main()
{
    BiTree Tree;
    CreateBiTree3(&Tree);
    printf("先序遍历：\n");
    PreOrderTraverse3(Tree);
    printf("\n");

    return 0;
}

void CreateBiTree3(BiTree *T)
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

void push3(BiTNode **a, BiTNode *elem)
{
    a[++top] = elem;
}

void pop3()
{
    if (top == -1)
    {
        return;
    }
    top--;
}

void displayElem3(BiTNode *elem)
{
    printf("%d ", elem->data);
}

BiTNode *getTop(BiTNode **a)
{
    return a[top];
}

void PreOrderTraverse3(BiTree Tree)
{
    BiTNode *a[20]; // 定义一个顺序栈
    BiTNode *p;     // 临时指针
    push3(a, Tree); // 根节点进栈
    while (top != -1)
    {
        p = getTop(a); // 取栈顶元素
        pop3();        // 弹栈
        while (p)
        {
            displayElem3(p); // 调用结点的操作函数
            // 若该节点有右孩子，右孩子进栈
            if (p->rchild)
            {
                push3(a, p->rchild);
            }
            p = p->lchild; // 一直指向根节点最后一个左孩子
        }
    }
}
