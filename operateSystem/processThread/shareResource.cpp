#include <iostream>
#include <thread>

int i = 0; // 共享数据

void test()
{
    int num = 10000;
    for(int n = 0; n < num; n++)
    {
        i = i + 1;
    }
}

int main(void)
{
    std::cout << "Start all threads." << std::endl;

    // 创建线程
    std::thread thread_test1(test); 
    std::thread thread_test2(test); 

    // 等待线程执行完成
    thread_test1.join();
    thread_test2.join();

    std::cout << "All threads joined." << std::endl;
    std::cout << "now i is " << i << std::endl;

    return 0;
}