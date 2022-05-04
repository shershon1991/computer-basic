#include <stdio.h>
#include <stdlib.h>
#include <unistd.h>
#include <pthread.h>
#include <vector>

pthread_mutex_t mutex = PTHREAD_MUTEX_INITIALIZER;

int num = 0;

void *producer(void*){
    int times = 10000000;
    while(times --){
        // pthread_mutex_lock(&mutex);
        num += 1;
        // pthread_mutex_unlock(&mutex);
    }
}

void *comsumer(void*){
    int times = 10000000;
    while(times --){
        // pthread_mutex_lock(&mutex);
        num -= 1;
        // pthread_mutex_unlock(&mutex);
    }
}


int main(){
    printf("Start in main function.");
    pthread_t thread1, thread2;
    pthread_create(&thread1, NULL, &producer, NULL);
    pthread_create(&thread2, NULL, &comsumer, NULL);
    pthread_join(thread1, NULL);
    pthread_join(thread2, NULL);
    printf("Print in main function: num = %d\n", num);
    return 0;
}

