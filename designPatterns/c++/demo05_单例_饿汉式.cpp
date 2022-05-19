#include <iostream>
using namespace std;

class Singleton2
{
private:
    Singleton2()
    {
        cout << "构造函数执行..." << endl;
    }

public:
    static Singleton2 *getInstance()
    {
        return m_psingle2;
    }
    static void freeInstance()
    {
        if (m_psingle2 != NULL)
        {
            delete m_psingle2;
            m_psingle2 = NULL;
        }
    }

private:
    static Singleton2 *m_psingle2;
};

// 饿汉式
// 对静态变量初始化，需要放在类的外面
// Singleton2* Singleton2::m_psingle2 = new Singleton2;
Singleton2 *Singleton2::m_psingle2 = NULL;

int main501()
{
    printf("sss");
    Singleton2 *p1 = Singleton2::getInstance();
    Singleton2 *p2 = Singleton2::getInstance();

    if (p1 == p2)
    {
        cout << "是同一个对象" << endl;
    }
    else
    {
        cout << "不是同一个对象" << endl;
    }
    Singleton2::freeInstance();

    cout << "hello..." << endl;

    return 0;
}

int main502()
{
    main501();

    return 0;
}
