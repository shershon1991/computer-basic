#include <iostream>
using namespace std;

class Doctor
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
};

class CommandTreatEye
{
public:
    CommandTreatEye(Doctor *doctor)
    {
        m_doctor = doctor;
    }
    void treat()
    {
        m_doctor->treat_eye();
    }

private:
    Doctor *m_doctor;
};

class CommandTreatNose
{
public:
    CommandTreatNose(Doctor *doctor)
    {
        m_doctor = doctor;
    }
    void treat()
    {
        m_doctor->treat_nose();
    }

private:
    Doctor *m_doctor;
};

void main2101()
{
    // 1.医生直接看病
    /*
Doctor* doctor = new Doctor;
doctor->treat_eye();
doctor->treat_nose();
delete doctor;
*/

    // 2.通过一个命令
    Doctor *doctor = new Doctor;
    CommandTreatEye *commandtreateye = new CommandTreatEye(doctor);
    commandtreateye->treat();
    delete commandtreateye;

    CommandTreatNose *commandtreatnose = new CommandTreatNose(doctor);
    commandtreatnose->treat();
    delete commandtreatnose;
    delete doctor;

    return;
}

int main2102()
{
    main2101();

    cout << "hello..." << endl;
    return 0;
}
