#include <iostream>
#include <cstring>
#include <stdio.h>
#include <unistd.h>

using namespace std;

int main()
{
    pid_t pid;

    int num = 888;
    pid = fork();

    if(pid == 0){
        cout << "这是一个子进程." << endl;
        cout << "num in son process: " << num << endl;
        while(true){
            num += 1;
            cout << "num in son process: " << num << endl;
            sleep(1);
        }
    }
    else if(pid > 0){
        cout << "这是一个父进程." << endl;
        cout << "子进程id: " << pid << endl;
        cout << "num in father process: " << num << endl;
        while(true){
            num -= 1;
            cout << "num in father process: " << num << endl;
            sleep(1);
        }
    }
    else if (pid < 0){
        cout << "创建进程失败." << endl;
    }
    return 0;
}
