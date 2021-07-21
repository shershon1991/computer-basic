#include <iostream>
using namespace std;
#include "list"
#include "string"

class IFile
{
public:
          virtual void display() = 0;
          virtual int add(IFile *ifile) = 0;
          virtual int remove(IFile *ifile) = 0;
          virtual list<IFile *> *getChild() = 0;
};

class File : public IFile
{
public:
          File(string name)
          {
                    m_name = name;
          }
          virtual void display()
          {
                    cout << m_name << endl;
          }
          virtual int add(IFile *ifile)
          {
                    return -1;
          }
          virtual int remove(IFile *ifile)
          {
                    return -1;
          }
          virtual list<IFile *> *getChild()
          {
                    return NULL;
          }

private:
          string m_name;
};

class Dir : public IFile
{
public:
          Dir(string name)
          {
                    m_name = name;
                    m_list = new list<IFile *>;
                    m_list->clear();
          }
          virtual void display()
          {
                    cout << m_name << endl;
          }
          virtual int add(IFile *ifile)
          {
                    m_list->push_back(ifile);
                    return 0;
          }
          virtual int remove(IFile *ifile)
          {
                    m_list->remove(ifile);
                    return 0;
          }
          virtual list<IFile *> *getChild()
          {
                    return m_list;
          }

private:
          string m_name;
          list<IFile *> *m_list;
};

int main1701()
{
          Dir *root = new Dir("C");
          root->display();

          Dir *dir1 = new Dir("111dir");
          File *aaafile = new File("aaa.txt");

          list<IFile *> *mylist = root->getChild();

          root->add(dir1);
          root->add(aaafile);

          for (list<IFile *>::iterator it = mylist->begin(); it != mylist->end(); it++)
          {

                    (*it)->display();
          }

          cout << "hello..." << endl;
          return 0;
}
