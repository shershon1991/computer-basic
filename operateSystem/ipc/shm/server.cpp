#include "common.h"

#include <sys/shm.h>
#include <stdlib.h>
#include <unistd.h>
#include <stdio.h>
#include <string.h>

#include <iostream>

int main()
{
    // 共享内存的结构体
    struct ShmEntry *entry;

    // 1. 申请共享内存
    int shmid = shmget((key_t)1111, sizeof(struct ShmEntry), 0666|IPC_CREAT);
    if (shmid == -1){
        std::cout << "Create share memory error!" << std::endl;
        return -1;
    }

    // 2. 连接到当前进程空间/使用共享内存
    entry = (ShmEntry*)shmat(shmid, 0, 0);
    entry->can_read = 0;
    while (true){
        if (entry->can_read == 1){
            std::cout << "Received message: " << entry->msg << std::endl;
            entry->can_read = 0;
        }else{
            std::cout << "Entry can not read. Sleep 1s." << std::endl;
            sleep(1);
        }
    }
    // 3. 脱离进程空间
    shmdt(entry);

    // 4. 删除共享内存 
    shmctl(shmid, IPC_RMID, 0);

    return 0;
}
