# -*- encoding=utf-8 -*-


from computer_principle.DoubleLinkedList import DoubleLinkedList, Node


class LRUCache(object):

    def __init__(self, capacity):
        self.capacity = capacity
        self.map = {}
        self.list = DoubleLinkedList(self.capacity)

    def get(self, key):
        if key in self.map:
            node = self.map[key]
            self.list.remove(node)
            self.list.append_front(node)
            return node.value
        else:
            return -1

    def put(self, key, value):
        if key in self.map:
            node = self.map.get(key)
            self.list.remove(node)
            node.value = value
            self.list.append_front(node)
        else:
            node = Node(key, value)
            # 缓存已经满了
            if self.list.size >= self.list.capacity:
                old_node = self.list.remove()
                self.map.pop(old_node.key)

            self.list.append_front(node)
            self.map[key] = node

    def print3(self):
        self.list.myprint()


if __name__ == '__main__':
    cache = LRUCache(2)
    cache.put(2, 2)
    cache.print3()
    cache.put(1, 1)
    cache.print3()
    cache.put(3, 3)
    cache.print3()
    print(cache.get(1))
    cache.print3()
    print(cache.get(2))
    cache.print3()
    print(cache.get(3))
    cache.print3()
