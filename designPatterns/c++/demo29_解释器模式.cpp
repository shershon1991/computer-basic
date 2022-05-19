#include <iostream>
using namespace std;

class Context
{
public:
    Context(int num)
    {
        this->m_num = num;
    }
    int getNum()
    {
        return m_num;
    }
    int getRes()
    {
        return m_res;
    }
    void setNum(int num)
    {
        this->m_num = num;
    }
    void setRes(int res)
    {
        this->m_res = res;
    }

private:
    int m_num;
    int m_res;
};

class Expression
{
public:
    virtual void interpreter(Context *context) = 0;

private:
    Context *m_context;
};

// 加法
class PlusExpression : public Expression
{
public:
    PlusExpression()
    {
        this->m_context = NULL;
    }
    virtual void interpreter(Context *context)
    {
        int num = context->getNum();
        num++;
        context->setNum(num);
        context->setRes(num);
    }

private:
    Context *m_context;
};

// 减法
class MinusExpression : public Expression
{
public:
    MinusExpression()
    {
        this->m_context = NULL;
    }
    virtual void interpreter(Context *context)
    {
        int num = context->getNum();
        num--;
        context->setNum(num);
        context->setRes(num);
    }

private:
    Context *m_context;
};

int main2901()
{
    Expression *expression = NULL;
    Expression *expression2 = NULL;
    Context *context = NULL;

    context = new Context(10);
    cout << context->getNum() << endl;

    expression = new PlusExpression();
    expression->interpreter(context);
    cout << context->getRes() << endl;

    expression2 = new MinusExpression;
    expression2->interpreter(context);
    cout << context->getRes() << endl;

    cout << "hello..." << endl;

    return 0;
}
