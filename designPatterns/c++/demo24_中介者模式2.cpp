#include <iostream>
using namespace std;
#include "string"

class Mediator;
class Person2
{
public:
    Person2(string name, int sex, int condi, Mediator *mediator)
    {
        m_name = name;
        m_sex = sex;
        m_condi = condi;
        m_mediator = mediator;
    }
    string getName()
    {
        return m_name;
    }
    int getSex()
    {
        return m_sex;
    }
    int getCondi()
    {
        return m_condi;
    }
    virtual void getParter(Person2 *p) = 0;

protected:
    string m_name;
    int m_sex;
    int m_condi;
    Mediator *m_mediator;
};

class Mediator
{
public:
    void setMan(Person2 *man)
    {
        pMan = man;
    }
    void setWoman(Person2 *woman)
    {
        pWoman = woman;
    }

public:
    virtual void getParter()
    {
        //。。。
        if (pWoman->getSex() == pMan->getSex())
        {
            cout << "我不是同性恋" << endl;
        }
        if (pWoman->getCondi() == pMan->getCondi())
        {
            cout << pWoman->getName() << " 和 " << pMan->getName() << "绝配" << endl;
        }
        else
        {
            cout << pWoman->getName() << " 和 " << pWoman->getName() << "不配" << endl;
        }
    }

private:
    Person2 *pMan;
    Person2 *pWoman;
};

class Woman2 : public Person2
{
public:
    Woman2(string name, int sex, int condi, Mediator *mediator) : Person2(name, sex, condi, mediator)
    {
        ;
    }
    virtual void getParter(Person2 *p)
    {
        m_mediator->setMan(p);
        m_mediator->setWoman(this);
        m_mediator->getParter();
    }
};

class Man2 : public Person2
{
public:
    Man2(string name, int sex, int condi, Mediator *mediator) : Person2(name, sex, condi, mediator)
    {
        ;
    }
    virtual void getParter(Person2 *p)
    {
        m_mediator->setMan(this);
        m_mediator->setWoman(p);
        m_mediator->getParter();
    }
};

int main2401_2()
{
    Person2 *xiaofang = NULL;
    Person2 *zhangsan = NULL;
    Person2 *lisi = NULL;
    Mediator *m = NULL;

    m = new Mediator;
    xiaofang = new Woman2("小芳", 2, 5, m);
    zhangsan = new Man2("张三", 1, 4, m);
    lisi = new Man2("李四", 1, 5, m);

    xiaofang->getParter(zhangsan);
    xiaofang->getParter(lisi);

    cout << "hello..." << endl;
    return 0;
}
