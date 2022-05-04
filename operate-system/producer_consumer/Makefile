export CC=gcc
export CPP=g++
export CFLAGS= -g -lpthread


CSRCS = $(wildcard *.c)  
COBJS = $(patsubst %.c, %, $(CSRCS))  
CPPSRCS = $(wildcard *.cpp)  
CPPOBJS += $(patsubst %.cpp, %, $(CPPSRCS))  

OBJ = $(COBJS)
OBJ += $(CPPOBJS)

all: $(OBJ)

%:%.c 
	$(CC) $^ -o $@ $(CFLAGS)

%:%.cpp 
	$(CPP) $^ -o $@ $(CFLAGS)

clean:
	rm *.o $(OBJ)  -rf

.PHONY:clean
