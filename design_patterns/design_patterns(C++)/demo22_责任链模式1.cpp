#include <iostream>
using namespace std;

class CarHandle
{
public:
          virtual void HandleCar() = 0;

public:
          virtual ~CarHandle()
          {
          }
};

class HeadCarHandle : public CarHandle
{
public:
          virtual void HandleCar()
          {
                    cout << "造车头" << endl;
          }
};

class BodyCarHandle : public CarHandle
{
public:
          virtual void HandleCar()
          {
                    cout << "造车身" << endl;
          }
};

class TailCarHandle : public CarHandle
{
public:
          virtual void HandleCar()
          {
                    cout << "造车尾" << endl;
          }
};

int main2201()
{
          CarHandle *headHandle = new HeadCarHandle;
          CarHandle *bodyHandle = new BodyCarHandle;
          CarHandle *tailHandle = new TailCarHandle;

          headHandle->HandleCar();
          bodyHandle->HandleCar();
          tailHandle->HandleCar();

          delete headHandle;
          delete bodyHandle;
          delete tailHandle;

          cout << "hello..." << endl;

          return 0;
}
