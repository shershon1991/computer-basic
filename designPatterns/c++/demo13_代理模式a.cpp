#include <iostream>
using namespace std;

class Subject
{
public:
    virtual void sailbook() = 0;

public:
    virtual ~Subject()
    {
    }
};

class RealSubjectBook : public Subject
{
public:
    virtual void sailbook()
    {
        cout << "卖书" << endl;
    }
};

class dangdangProxy : public Subject
{
public:
    virtual void sailbook()
    {
        m_subject = new RealSubjectBook;
        dazhe();
        m_subject->sailbook();
        dazhe();
    }

public:
    void dazhe()
    {
        cout << "双十一打五折" << endl;
    }

private:
    Subject *m_subject;
};

int main1301()
{
    Subject *s = new dangdangProxy;
    s->sailbook();
    delete s;

    cout << "hello..." << endl;
    return 0;
}
