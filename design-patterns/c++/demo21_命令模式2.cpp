#include <iostream>
using namespace std;
#include "list"

class Doctor2
{
public:
          void treat_eye()
          {
                    cout << "医生 治疗 眼科病" << endl;
          }
          void treat_nose()
          {
                    cout << "医生 治疗 鼻科病" << endl;
          }

public:
          virtual ~Doctor2()
          {
          }
};

class Command2
{
public:
          virtual void treat() = 0;

public:
          virtual ~Command2()
          {
          }
};

class CommandTreatEye2 : public Command2
{
public:
          CommandTreatEye2(Doctor2 *doctor)
          {
                    m_doctor = doctor;
          }
          void treat()
          {
                    m_doctor->treat_eye();
          }

private:
          Doctor2 *m_doctor;
};

class CommandTreatNose2 : public Command2
{
public:
          CommandTreatNose2(Doctor2 *doctor)
          {
                    m_doctor = doctor;
          }
          void treat()
          {
                    m_doctor->treat_nose();
          }

private:
          Doctor2 *m_doctor;
};

// 小护士
class BeautyNurse
{
public:
          BeautyNurse(Command2 *command)
          {
                    m_command = command;
          }

public:
          void SubmitCase() // 提交病例，下單命令
          {
                    m_command->treat();
          }

private:
          Command2 *m_command;
};

// 护士长
class HeadNurse
{
public:
          HeadNurse()
          {
                    m_list.clear();
          }

public:
          void setCommand(Command2 *command)
          {
                    m_list.push_back(command);
          }
          void SubmitCase() // 提交病例，下單命令
          {
                    for (list<Command2 *>::iterator it = m_list.begin(); it != m_list.end(); it++)
                    {
                              (*it)->treat();
                    }
          }

private:
          list<Command2 *> m_list;
};

// 通过一个命令
int main2101_2()
{
          Doctor2 *doctor = new Doctor2;
          Command2 *command = new CommandTreatEye2(doctor);
          command->treat();
          delete command;

          Command2 *command2 = new CommandTreatNose2(doctor);
          command2->treat();
          delete command2;
          delete doctor;

          return 0;
}

// 通过小护士下达命令
int main2102_2()
{
          Command2 *command = NULL;
          Doctor2 *doctor = NULL;
          BeautyNurse *beautynurse = NULL;

          doctor = new Doctor2;
          command = new CommandTreatEye2(doctor);
          beautynurse = new BeautyNurse(command);
          beautynurse->SubmitCase();

          command = new CommandTreatNose2(doctor);
          beautynurse = new BeautyNurse(command);
          beautynurse->SubmitCase();

          delete doctor;
          delete command;
          delete beautynurse;

          return 0;
}

// 通过护士长批量的下达命令
int main2103_2()
{
          Command2 *command1 = NULL;
          Command2 *command2 = NULL;
          Doctor2 *doctor = NULL;
          HeadNurse *headnurse = NULL;

          doctor = new Doctor2;
          command1 = new CommandTreatEye2(doctor);
          command2 = new CommandTreatNose2(doctor);

          headnurse = new HeadNurse;
          headnurse->setCommand(command1);
          headnurse->setCommand(command2);

          headnurse->SubmitCase(); //护士长批量下达命令

          delete doctor;
          delete command1;
          delete command2;
          delete headnurse;

          return 0;
}

int main2104_4()
{
          //main2101_2();
          //main2102_2();
          main2103_2();

          cout << "hello..." << endl;

          return 0;
}
