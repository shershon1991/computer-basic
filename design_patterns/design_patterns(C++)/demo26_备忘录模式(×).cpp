#include <iostream>
using namespace std;
#include "string"

class Memento
{
public:
          Memento(string name, int age)
          {
                    m_name = name;
                    m_age = age;
          }
          string getName()
          {
                    return m_name;
          }
          int getAge()
          {
                    return m_age;
          }
          void setName(string name)
          {
                    m_name = name;
          }
          void setAge(int age)
          {
                    m_age = age;
          }

private:
          string m_name;
          int m_age;
};

class Person
{
public:
          Person(string name, int age)
          {
                    m_name = name;
                    m_age = age;
          }
          string getName()
          {
                    return m_name;
          }
          int getAge()
          {
                    return m_age;
          }
          void setName(string name)
          {
                    m_name = name;
          }
          void setAge(int age)
          {
                    m_age = age;
          }
          Memento *createMemento()
          {
                    return new Memento(this->m_name, this->m_age);
          }
          void setMemento(Memento *memen)
          {
                    m_age = memen->getAge();
                    m_name = memen->getName();
          }
          void printT()
          {
                    cout << "m_name:" << m_name << ", m_age:" << m_age << endl;
          }

private:
          string m_name;
          int m_age;
};

class CareTaker
{
public:
          CareTaker(Memento *memento)
          {
                    m_memento = memento;
          }
          Memento *getMemento()
          {
                    return m_memento;
          }
          void setMemento(Memento *memento)
          {
                    m_memento = memento;
          }

private:
          Memento *m_memento;
};

int main2601()
{
          Person *p = NULL;
          Memento *memento = NULL;

          p = new Person("张三", 31);
          p->printT();

          printf("------------\n");
          memento = p->createMemento();
          p->setAge(42);
          p->printT();

          printf("还原旧状态");
          p->setMemento(memento);
          p->printT();

          delete p;
          delete memento;
          return 0;
}

int main2602()
{
          Person *p = NULL;
          Memento *memento = NULL;
          CareTaker *caretaker = NULL;

          p = new Person("张三", 31);
          p->printT();

          printf("------------\n");
          caretaker = new CareTaker(p->createMemento());
          p->setAge(42);
          p->printT();

          printf("还原旧状态");
          p->setMemento(caretaker->getMemento());
          p->printT();

          delete p;
          delete caretaker;
          return 0;
}

int main2603()
{
          //main2601();
          main2602();

          cout << "hello..." << endl;
          return 0;
}
