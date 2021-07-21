#include <iostream>
using namespace std;

class Engine
{
public:
          virtual void InstallEngine() = 0;

public:
          virtual ~Engine()
          {
          }
};

class my4400cc : public Engine
{
public:
          virtual void InstallEngine()
          {
                    cout << "我是4400cc发动机，安装完毕" << endl;
          }
};

class my4500cc : public Engine
{
public:
          virtual void InstallEngine()
          {
                    cout << "我是4500cc发动机，安装完毕" << endl;
          }
};

class Car
{
public:
          Car(Engine *engine)
          {
                    m_engine = engine;
          }
          virtual void InstallEngine() = 0;

protected:
          Engine *m_engine;

public:
          virtual ~Car()
          {
          }
};

class BMW5 : public Car
{
public:
          BMW5(Engine *engine) : Car(engine)
          {
                    ;
          }
          virtual void InstallEngine()
          {
                    m_engine->InstallEngine();
          }
};

int main1601()
{
          Engine *engine = NULL;
          BMW5 *bmw5 = NULL;

          engine = new my4400cc;
          bmw5 = new BMW5(engine);
          bmw5->InstallEngine();

          delete bmw5;
          delete engine;

          cout << "hello..." << endl;
          return 0;
}
