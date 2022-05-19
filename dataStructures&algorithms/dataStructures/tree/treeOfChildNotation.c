#define _CRT_SECURE_NO_WARNINGS
#include <stdio.h>
#include <stdlib.h>

#define MAX_SIZE 20
#define TElemType char

//孩子表示法
typedef struct CTNode
{
    int child; //链表中每个结点存储的不是数据本身，而是数据在数组中存储的位置下标
    struct CTNode *next;
} ChildPtr;

typedef struct
{
    TElemType data;       //结点的数据类型
    ChildPtr *firstchild; //孩子链表的头指针
} CTBox;

typedef struct
{
    CTBox nodes[MAX_SIZE]; //存储结点的数组
    int n, r;              //结点数量和树根的位置
} CTree;

//孩子表示法存储普通树
CTree initTree(CTree tree)
{
    printf("输入节点数量：\n");
    scanf("%d", &(tree.n));
    for (int i = 0; i < tree.n; i++)
    {
        printf("输入第 %d 个节点的值：\n", i + 1);
        fflush(stdin);
        scanf(" %c", &(tree.nodes[i].data));
        tree.nodes[i].firstchild = (ChildPtr *)malloc(sizeof(ChildPtr));
        tree.nodes[i].firstchild->next = NULL;
        printf("输入节点%c的孩子节点数量：\n", tree.nodes[i].data);
        int Num;
        scanf("%d", &Num);
        if (Num != 0)
        {
            ChildPtr *p = tree.nodes[i].firstchild;
            for (int j = 0; j < Num; j++)
            {
                ChildPtr *newEle = (ChildPtr *)malloc(sizeof(ChildPtr));
                newEle->next = NULL;
                printf("输入第 %d 个孩子节点在顺序表中的位置", j + 1);
                scanf("%d", &(newEle->child));
                p->next = newEle;
                p = p->next;
            }
        }
    }
    return tree;
}

void findKids(CTree tree, char a)
{
    int hasKids = 0;
    for (int i = 0; i < tree.n; i++)
    {
        if (tree.nodes[i].data == a)
        {
            ChildPtr *p = tree.nodes[i].firstchild->next;
            while (p)
            {
                hasKids = 1;
                printf("%c ", tree.nodes[p->child].data);
                p = p->next;
            }
            break;
        }
    }
    if (hasKids == 0)
    {
        printf("此节点为叶子节点");
    }
}

// 树的孩子表示法
int main()
{
    CTree tree;
    tree.n = 10;
    tree = initTree(tree);
    //默认数根节点位于数组notes[0]处
    tree.r = 0;
    printf("找出节点 F 的所有孩子节点：");
    findKids(tree, 'F');

    return 0;
}