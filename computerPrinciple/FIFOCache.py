# -*- encoding=utf-8 -*-

from computerPrinciple.DoubleLinkedList import DoubleLinkedList, Node


class FIFOCache(object):
    def __init__(self, capacity):
        self.capacity = capacity
        self.size = 0
        self.map = {}
        self.list = DoubleLinkedList(self.capacity)

    def get(self, key):
        if key not in self.map:
            return -1
        else:
            node = self.map.get(key)
            return node.value

    def put(self, key, value):
        if self.capacity == 0:
            return

        if key in self.map:
            node = self.map.get(key)
            self.list.remove(node)
            node.value = value
            self.list.append(node)
        else:
            if self.size == self.capacity:
                node = self.list.pop()
                del self.map[node.key]
                self.size -= 1
            node = Node(key, value)
            self.list.append(node)
            self.map[key] = node
            self.size += 1

    def print1(self):
        self.list.myprint()


# 先进先出置换算法
if __name__ == '__main__':
    cache = FIFOCache(2)

    cache.put(1, 1)
    cache.print1()

    cache.put(2, 2)
    cache.print1()

    print(cache.get(1))

    cache.put(3, 3)
    cache.print1()

    print(cache.get(2))
    cache.print1()

    cache.put(4, 4)
    cache.print1()

    print(cache.get(1))
