#include <iostream>
using namespace std;

class Strategy
{
public:
          virtual void crypt() = 0;

public:
          virtual ~Strategy()
          {
          }
};

class AES : public Strategy
{
public:
          virtual void crypt()
          {
                    cout << "AES加密算法" << endl;
          }
};

class DES : public Strategy
{
public:
          virtual void crypt()
          {
                    cout << "DES加密算法" << endl;
          }
};

class Context
{
public:
          void setStrategy(Strategy *strategy)
          {
                    m_strategy = strategy;
          }
          void myoperator()
          {
                    m_strategy->crypt();
          }

private:
          Strategy *m_strategy;
};

int main2301()
{
          /*
	DES* des = NULL;
	des = new DES;
	des->crypt();
	delete des;
	*/

          Strategy *strategy = NULL;
          Context *context = NULL;
          strategy = new AES;
          //strategy = new DES;
          context = new Context;
          context->setStrategy(strategy);
          context->myoperator();

          delete strategy;
          delete context;

          cout << "hello..." << endl;

          return 0;
}
