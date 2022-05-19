#include <iostream>
using namespace std;

class Car
{
public:
    virtual void show() = 0;
};

class RunCar : public Car
{
public:
    virtual void show()
    {
        cout << "可以跑" << endl;
    }
};

class SwinCarDecorate : public Car
{
public:
    SwinCarDecorate(Car *car)
    {
        m_car = car;
    }
    void swin()
    {
        cout << "可以游" << endl;
    }
    virtual void show()
    {
        m_car->show();
        swin();
    }

private:
    Car *m_car;
};

class FlyCarDecorate : public Car
{
public:
    FlyCarDecorate(Car *car)
    {
        m_car = car;
    }
    void fly()
    {
        cout << "可以飞" << endl;
    }
    virtual void show()
    {
        m_car->show();
        fly();
    }

private:
    Car *m_car;
};

int main1401()
{
    Car *mycar = NULL;
    mycar = new RunCar;
    mycar->show();
    printf("---------------\n");

    FlyCarDecorate *flycar = new FlyCarDecorate(mycar);
    flycar->show();
    printf("---------------\n");

    SwinCarDecorate *swincar = new SwinCarDecorate(flycar);
    swincar->show();
    printf("---------------\n");

    cout << "hello..." << endl;
    system("pause");
    return 0;
}
