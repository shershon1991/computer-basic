#include <stdio.h>
#include <stdlib.h>
#include <unistd.h>
#include <pthread.h>
#include <vector>

int num = 0;

pthread_mutex_t mutex = PTHREAD_MUTEX_INITIALIZER;
pthread_rwlock_t rwlock = PTHREAD_RWLOCK_INITIALIZER;

void *reader(void*){
    int times = 10000000;
    while(times --){
        // pthread_rwlock_rdlock(&rwlock);
        pthread_mutex_lock(&mutex);
	    if (times % 1000 == 0){
            // printf("print num in reader: num = %d\n", num);
            // sleep(1);
            usleep(10);
	        }
        pthread_mutex_unlock(&mutex);
        // pthread_rwlock_unlock(&rwlock);
    }
}

void *writer(void*){
    int times = 10000000;
    while(times --){
        pthread_mutex_lock(&mutex);
        // pthread_rwlock_wrlock(&rwlock);
	    num += 1;
        // pthread_rwlock_unlock(&rwlock);
        pthread_mutex_unlock(&mutex);
    }
}


int main(){
    printf("Start in main function.\n");
    pthread_t thread1, thread2, thread3;
    pthread_create(&thread1, NULL, &reader, NULL);
    pthread_create(&thread2, NULL, &reader, NULL);
    pthread_create(&thread3, NULL, &writer, NULL);
    pthread_join(thread1, NULL);
    pthread_join(thread2, NULL);
    pthread_join(thread3, NULL);
    printf("Print in main function: num = %d\n", num);
    return 0;
}

