#include <iostream>
using namespace std;
#include "string"
#include "list"

class Secretary;

// 观察者
class PlayerObserver
{
public:
    PlayerObserver(Secretary *secretary)
    {
        m_secretary = secretary;
    }
    void update(string action)
    {
        cout << "老板来了，我要好好工作" << endl;
        cout << "action:" << action << endl;
    }

private:
    Secretary *m_secretary;
};

class Secretary
{
public:
    Secretary()
    {
        m_list.clear();
    }
    void Notify(string info)
    {
        // 给所有的观察者发送情报
        for (list<PlayerObserver *>::iterator it = m_list.begin(); it != m_list.end(); it++)
        {
            (*it)->update(info);
        }
    }
    void setPlayerObserver(PlayerObserver *o)
    {
        m_list.push_back(o);
    }

private:
    list<PlayerObserver *> m_list;
};

int main2501()
{
    Secretary *secretary = NULL;
    PlayerObserver *po1 = NULL;
    PlayerObserver *po2 = NULL;

    secretary = new Secretary;
    po1 = new PlayerObserver(secretary);
    po2 = new PlayerObserver(secretary);

    secretary->setPlayerObserver(po1);
    secretary->setPlayerObserver(po2);

    secretary->Notify("老板来了");
    secretary->Notify("老板走了");

    delete secretary;
    delete po1;
    delete po2;

    cout << "hello..." << endl;
    return 0;
}
