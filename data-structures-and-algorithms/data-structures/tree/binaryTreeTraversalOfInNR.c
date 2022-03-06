#include <stdio.h>
#include <string.h>
#include <stdlib.h>

#define TElemType int
int top5 = -1; //top5变量时刻表示栈顶元素所在位置

//构造结点的结构体
typedef struct BiTNode
{
          TElemType data;                  //数据域
          struct BiTNode *lchild, *rchild; //左右孩子指针
} BiTNode, *BiTree;

//初始化树的函数
void CreateBiTree5(BiTree *T);

//前序和中序遍历使用的进栈函数
void push5(BiTNode **a, BiTNode *elem);

//弹栈函数
void pop5();

//模拟操作结点元素的函数，输出结点本身的数值
void displayElem5(BiTNode *elem);

//拿到栈顶元素
BiTNode *getTop5(BiTNode **a);

//中序遍历非递归算法
void InOrderTraverse1(BiTree Tree);

//中序遍历实现的另一种方法
void InOrderTraverse2(BiTree Tree);

// 二叉树中序遍历（非递归）
int main()
{
          BiTree Tree;
          CreateBiTree5(&Tree);
          printf("\n中序遍历算法1: \n");
          InOrderTraverse1(Tree);
          printf("\n中序遍历算法2: \n");
          InOrderTraverse2(Tree);
          printf("\n");

          return 0;
}

void CreateBiTree5(BiTree *T)
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

void push5(BiTNode **a, BiTNode *elem)
{
          a[++top5] = elem;
}

void pop5()
{
          if (top5 == -1)
          {
                    return;
          }
          top5--;
}

void displayElem5(BiTNode *elem)
{
          printf("%d ", elem->data);
}

BiTNode *getTop5(BiTNode **a)
{
          return a[top5];
}

void InOrderTraverse1(BiTree Tree)
{
          BiTNode *a[20]; //定义一个顺序栈
          BiTNode *p;     //临时指针
          push5(a, Tree); //根结点进栈
          while (top5 != -1)
          { //top5!=-1说明栈内不为空，程序继续运行
                    while ((p = getTop5(a)) && p)
                    {                              //取栈顶元素，且不能为NULL
                              push5(a, p->lchild); //将该结点的左孩子进栈，如果没有左孩子，NULL进栈
                    }
                    pop5(); //跳出循环，栈顶元素肯定为NULL，将NULL弹栈
                    if (top5 != -1)
                    {
                              p = getTop5(a); //取栈顶元素
                              pop5();         //栈顶元素弹栈
                              displayElem5(p);
                              push5(a, p->rchild); //将p指向的结点的右孩子进栈
                    }
          }
}

void InOrderTraverse2(BiTree Tree)
{
          BiTNode *a[20]; //定义一个顺序栈
          BiTNode *p;     //临时指针
          p = Tree;
          //当p为NULL或者栈为空时，表明树遍历完成
          while (p || top5 != -1)
          {
                    //如果p不为NULL，将其压栈并遍历其左子树
                    if (p)
                    {
                              push5(a, p);
                              p = p->lchild;
                    }
                    //如果p==NULL，表明左子树遍历完成，需要遍历上一层结点的右子树
                    else
                    {
                              p = getTop5(a);
                              pop5();
                              displayElem5(p);
                              p = p->rchild;
                    }
          }
}