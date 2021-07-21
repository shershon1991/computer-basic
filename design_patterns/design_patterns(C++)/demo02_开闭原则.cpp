#include <iostream>
using namespace std;

class BankWorker
{
public:
          void save()
          {
                    cout << "存款" << endl;
          }
          void moveM()
          {
                    cout << "转账" << endl;
          }
          void jiaofei()
          {
                    cout << "交费" << endl;
          }
};

class AbBankWorker
{
public:
          virtual void dothing() = 0;

public:
          virtual ~AbBankWorker()
          {
          }
};

class SaveBanker : public AbBankWorker
{
public:
          virtual void dothing()
          {
                    cout << "存款" << endl;
          }
};

class MoveBanker : public AbBankWorker
{
public:
          virtual void dothing()
          {
                    cout << "转账" << endl;
          }
};

int main201()
{
          BankWorker *bw = new BankWorker;
          bw->save();
          bw->moveM();
          bw->jiaofei();

          cout << "hello..." << endl;
          return 0;
}

int main202()
{
          AbBankWorker *bw = NULL;
          bw = new MoveBanker();
          bw->dothing();
          delete bw;

          bw = new SaveBanker();
          bw->dothing();
          delete bw;

          return 0;
}

int main203()
{
          //main201();
          main202();

          return 0;
}