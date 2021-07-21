#include <iostream>
using namespace std;

// 懒汉式
class Singleton
{
private:
          Singleton()
          {
                    cout << "构造函数执行begin..." << endl;
                    //_sleep(1000);
                    cout << "构造函数执行end..." << endl;
          }

public:
          static Singleton *getInstance()
          {
                    if (m_psingle == NULL)
                    {
                              m_psingle = new Singleton;
                    }
                    return m_psingle;
          }
          static void freeInstance()
          {
                    if (m_psingle != NULL)
                    {
                              delete m_psingle;
                              m_psingle = NULL;
                    }
          }

private:
          static Singleton *m_psingle;
};

// 对静态变量初始化，需要放在类的外面
Singleton *Singleton::m_psingle = NULL;

int main401()
{
          Singleton *p1 = Singleton::getInstance();
          Singleton *p2 = Singleton::getInstance();

          if (p1 == p2)
          {
                    cout << "是同一个对象" << endl;
          }
          else
          {
                    cout << "不是同一个对象" << endl;
          }
          Singleton::freeInstance();

          cout << "hello..." << endl;

          return 0;
}

int main402()
{
          main401();

          return 0;
}
