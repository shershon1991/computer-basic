#include <iostream>
using namespace std;
#include "string"

class Person
{
public:
    Person(string name, int sex, int condi)
    {
        m_name = name;
        m_sex = sex;
        m_condi = condi;
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
    virtual void getParter(Person *p) = 0;

protected:
    string m_name;
    int m_sex;
    int m_condi;
};

class Woman : public Person
{
public:
    Woman(string name, int sex, int condi) : Person(name, sex, condi)
    {
        ;
    }
    virtual void getParter(Person *p)
    {
        if (this->m_sex == p->getSex())
        {
            cout << "我不是同性恋" << endl;
        }
        if (this->m_condi == p->getCondi())
        {
            cout << this->getName() << " 和 " << p->getName() << "绝配" << endl;
        }
        else
        {
            cout << this->getName() << " 和 " << p->getName() << "不配" << endl;
        }
    }
};

class Man : public Person
{
public:
    Man(string name, int sex, int condi) : Person(name, sex, condi)
    {
        ;
    }
    virtual void getParter(Person *p)
    {
        if (this->m_sex == p->getSex())
        {
            cout << "我不是同性恋" << endl;
        }
        if (this->m_condi == p->getCondi())
        {
            cout << this->getName() << " 和 " << p->getName() << "绝配" << endl;
        }
        else
        {
            cout << this->getName() << " 和 " << p->getName() << "不配" << endl;
        }
    }
};

int main2401()
{
    Person *xiaofang = NULL;
    Person *zhangsan = NULL;
    Person *lisi = NULL;

    xiaofang = new Woman("小芳", 2, 5);
    zhangsan = new Man("张三", 1, 4);
    lisi = new Man("李四", 1, 5);

    xiaofang->getParter(zhangsan);
    xiaofang->getParter(lisi);

    cout << "hello..." << endl;

    return 0;
}
