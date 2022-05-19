#include <iostream>
using namespace std;

class SubSysytemA
{
public:
    void doThing()
    {
        cout << "SubSysytemA run" << endl;
    }
};

class SubSysytemB
{
public:
    void doThing()
    {
        cout << "SubSysytemB run" << endl;
    }
};

class SubSysytemC
{
public:
    void doThing()
    {
        cout << "SubSysytemC run" << endl;
    }
};

class Facade
{
public:
    Facade()
    {
        sysA = new SubSysytemA;
        sysB = new SubSysytemB;
        sysC = new SubSysytemC;
    }
    ~Facade()
    {
        delete sysA;
        delete sysB;
        delete sysC;
    }
    void doThing()
    {
        sysA->doThing();
        sysB->doThing();
        sysC->doThing();
    }

private:
    SubSysytemA *sysA;
    SubSysytemB *sysB;
    SubSysytemC *sysC;
};

int main1801()
{
    SubSysytemA *sysA = new SubSysytemA;
    SubSysytemB *sysB = new SubSysytemB;
    SubSysytemC *sysC = new SubSysytemC;

    sysA->doThing();
    sysB->doThing();
    sysC->doThing();

    delete sysA;
    delete sysB;
    delete sysC;

    return 0;
}

int main1802()
{
    Facade *f = new Facade;
    f->doThing();
    delete f;

    return 0;
}

int main1803()
{
    // main1801();
    main1802();

    cout << "hello..." << endl;

    return 0;
}