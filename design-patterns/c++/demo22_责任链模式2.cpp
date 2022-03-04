#include <iostream>
using namespace std;

// 造完车后，需要把任务传递下去
struct CarHandle2
{
public:
          virtual void HandleCar() = 0;
          CarHandle2 *setNextHandle(CarHandle2 *handle)
          {
                    m_handle = handle;
                    return m_handle;
          }

protected:
          CarHandle2 *m_handle;

public:
          virtual ~CarHandle2()
          {
          }
};

class HeadCarHandle2 : public CarHandle2
{
public:
          virtual void HandleCar()
          {
                    cout << "造车头" << endl;
                    // 造完车头之后，把任务递交给下一个处理者
                    if (m_handle != NULL)
                    {
                              m_handle->HandleCar();
                    }
          }
};

class BodyCarHandle2 : public CarHandle2
{
public:
          virtual void HandleCar()
          {
                    cout << "造车身" << endl;
                    // 造完车身之后，把任务递交给下一个处理者
                    if (m_handle != NULL)
                    {
                              m_handle->HandleCar();
                    }
          }
};

class TailCarHandle2 : public CarHandle2
{
public:
          virtual void HandleCar()
          {
                    cout << "造车尾" << endl;
                    // 造完车尾之后，把任务递交给下一个处理者
                    if (m_handle != NULL)
                    {
                              m_handle->HandleCar();
                    }
          }
};

int main2201_2()
{
          CarHandle2 *headHandle = new HeadCarHandle2;
          CarHandle2 *bodyHandle = new BodyCarHandle2;
          CarHandle2 *tailHandle = new TailCarHandle2;

          // 任务的处理关系
          /*
	headHandle->setNextHandle(bodyHandle);
	bodyHandle->setNextHandle(tailHandle);
	tailHandle->setNextHandle(NULL);
	*/

          headHandle->setNextHandle(tailHandle);
          tailHandle->setNextHandle(bodyHandle);
          bodyHandle->setNextHandle(NULL);

          headHandle->HandleCar();

          delete headHandle;
          delete bodyHandle;
          delete tailHandle;

          cout << "hello..." << endl;

          return 0;
}
