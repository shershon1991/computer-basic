#include <iostream>
using namespace std;

class Friut
{
public:
          virtual void SayName() = 0;

public:
          virtual ~Friut()
          {
          }
};

class AbstractFactory
{
public:
          virtual Friut *CreateBanana() = 0;
          virtual Friut *CreateApple() = 0;

public:
          virtual ~AbstractFactory()
          {
          }
};

class NorthBanana : public Friut
{
public:
          virtual void SayName()
          {
                    cout << "我是北方的香蕉" << endl;
          }
};

class NorthApple : public Friut
{
public:
          virtual void SayName()
          {
                    cout << "我是北方的苹果" << endl;
          }
};

class SouthBanana : public Friut
{
public:
          virtual void SayName()
          {
                    cout << "我是南方的香蕉" << endl;
          }
};

class SouthApple : public Friut
{
public:
          virtual void SayName()
          {
                    cout << "我是南方的苹果" << endl;
          }
};

class NorthFactory : public AbstractFactory
{
public:
          virtual Friut *CreateBanana()
          {
                    return new NorthBanana;
          }
          virtual Friut *CreateApple()
          {
                    return new NorthApple;
          }
};

class SouthFactory : public AbstractFactory
{
public:
          virtual Friut *CreateBanana()
          {
                    return new SouthBanana;
          }
          virtual Friut *CreateApple()
          {
                    return new SouthApple;
          }
};

int main1001()
{
          Friut *friut = NULL;
          AbstractFactory *af = NULL;

          af = new SouthFactory;
          friut = af->CreateApple();
          friut->SayName();
          delete friut;
          friut = af->CreateBanana();
          friut->SayName();
          delete friut;

          af = new NorthFactory;
          friut = af->CreateApple();
          friut->SayName();
          delete friut;
          friut = af->CreateBanana();
          friut->SayName();
          delete friut;

          delete af;
          cout << "hello..." << endl;

          return 0;
}
