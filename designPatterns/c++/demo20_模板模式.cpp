#include <iostream>
using namespace std;

class MakeCar
{
public:
          virtual void MakeHead() = 0;
          virtual void MakeBody() = 0;
          virtual void MakeTail() = 0;

public:
          void Make() // 模板函数
          {
                    MakeTail();
                    MakeBody();
                    MakeHead();
          }

public:
          virtual ~MakeCar()
          {
          }
};

class Jeep : public MakeCar
{
public:
          virtual void MakeHead()
          {
                    cout << "jeep head" << endl;
          }
          virtual void MakeBody()
          {
                    cout << "jeep body" << endl;
          }
          virtual void MakeTail()
          {
                    cout << "jeep tail" << endl;
          }
};

class BMW : public MakeCar
{
public:
          virtual void MakeHead()
          {
                    cout << "BMW head" << endl;
          }
          virtual void MakeBody()
          {
                    cout << "BMW body" << endl;
          }
          virtual void MakeTail()
          {
                    cout << "BMW tail" << endl;
          }
};

int main2001()
{
          MakeCar *car = new Jeep;
          car->Make();
          delete car;

          MakeCar *car2 = new BMW;
          car2->Make();
          delete car2;

          cout << "hello..." << endl;
          system("pause");
          return 0;
}
