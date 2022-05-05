#ifndef __COMMON_H__
#define __COMMON_H__

#define TEXT_LEN 2048

// 共享内存的数据结构
struct ShmEntry{
    // 是否可以读取共享内存，用于进程间同步
    bool can_read;
    // 共享内存信息
    char msg[2048]; 
};

#endif
