#include <iostream>
using namespace std;
#include "list"

class ParkElement;

class Visitor
{
public:
          virtual void visit(ParkElement *parkelement) = 0;

public:
          virtual ~Visitor()
          {
          }
};

class ParkElement
{
public:
          virtual void accept(Visitor *visit) = 0;

public:
          virtual ~ParkElement()
          {
          }
};

class ParkA : public ParkElement
{
public:
          virtual void accept(Visitor *v)
          {
                    v->visit(this); // 公园接受访问者访问，让访问者做操作
          }
};

class ParkB : public ParkElement
{
public:
          virtual void accept(Visitor *v)
          {
                    v->visit(this); // 公园接受访问者访问，让访问者做操作
          }
};

// 整个公园
class Park : public ParkElement
{
public:
          Park()
          {
                    m_list.clear();
          }
          void setParkElement(ParkElement *pe)
          {
                    m_list.push_back(pe);
          }
          virtual void accept(Visitor *v)
          {
                    for (list<ParkElement *>::iterator it = m_list.begin(); it != m_list.end(); it++)
                    {
                              (*it)->accept(v); // 公园A 公园B 接受 管理者v访问
                    }
          }

private:
          list<ParkElement *> m_list; // 公园的每一部分
};

class VisitorA : public Visitor
{
public:
          virtual void visit(ParkElement *parkelement)
          {
                    cout << "清洁工A 完成 公园A 部分的打扫" << endl;
          }
};

class VisitorB : public Visitor
{
public:
          virtual void visit(ParkElement *parkelement)
          {
                    cout << "清洁工B 完成 公园B 部分的打扫" << endl;
          }
};

class ManagerVisitor : public Visitor
{
          virtual void visit(ParkElement *parkelement)
          {
                    cout << "管理者 访问 公园的各个部分" << endl;
          }
};

int main2701()
{
          Visitor *vA = new VisitorA;
          Visitor *vB = new VisitorB;

          ParkA *parkA = new ParkA;
          ParkB *parkB = new ParkB;

          parkA->accept(vA);
          parkB->accept(vB);

          delete vA;
          delete vB;
          delete parkA;
          delete parkB;

          return 0;
}

int main2702()
{
          Visitor *vm = new ManagerVisitor;
          Park *park = new Park;

          ParkElement *parkA = new ParkA;
          ParkElement *parkB = new ParkB;

          park->setParkElement(parkA);
          park->setParkElement(parkB);

          // 整个公园接受管理者访问
          park->accept(vm);

          delete vm;
          delete park;
          delete parkA;
          delete parkB;

          return 0;
}

int main2703()
{
          //main2701();
          main2702();

          cout << "hello..." << endl;
          return 0;
}
