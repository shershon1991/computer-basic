#include <iostream>
using namespace std;

typedef int Object;
#define SIZE 5

class MyIterator
{
public:
    virtual void First() = 0;
    virtual void Next() = 0;
    virtual bool IsDone() = 0;
    virtual Object CurrentItem() = 0;

public:
    virtual ~MyIterator()
    {
    }
};

class Aggregate
{
public:
    virtual MyIterator *CreateIterator() = 0;
    virtual Object getItem(int index) = 0;
    virtual int getSize() = 0;

public:
    virtual ~Aggregate()
    {
    }
};

class ConcreteIterator : public MyIterator
{
public:
    ConcreteIterator(Aggregate *ag)
    {
        _ag = ag;
        _current_index = 0;
    }
    virtual void First()
    {
        _current_index = 0;
    }
    virtual void Next()
    {
        if (_current_index < _ag->getSize())
        {
            _current_index++;
        }
    }
    virtual bool IsDone()
    {
        return (_current_index == _ag->getSize());
    }
    virtual Object CurrentItem()
    {
        return _ag->getItem(_current_index);
    }

private:
    int _current_index;
    Aggregate *_ag;
};

class ConcreteAggregate : public Aggregate
{
public:
    ConcreteAggregate()
    {
        for (int i = 0; i < SIZE; i++)
        {
            object[i] = i + 100;
        }
    }
    virtual MyIterator *CreateIterator()
    {
        return new ConcreteIterator(this); // 让迭代器持有一个集合的引用
    }
    virtual Object getItem(int index)
    {
        return object[index];
    }
    virtual int getSize()
    {
        return SIZE;
    }

private:
    Object object[SIZE];
};

int main3001()
{
    Aggregate *ag = new ConcreteAggregate;
    MyIterator *it = ag->CreateIterator();

    for (; !(it->IsDone()); it->Next())
    {
        cout << it->CurrentItem() << " ";
    }

    delete ag;
    delete it;

    cout << "hello..." << endl;

    return 0;
}
