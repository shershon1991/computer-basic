# -*- encoding=utf-8 -*-


import struct

bin_str = b'ABCD1234'
print(bin_str)
result = struct.unpack('>BBBBBBBB', bin_str)
print(result)
result = struct.unpack('>HHHH', bin_str)
print(result)
result = struct.unpack('>LL', bin_str)
print(result)
result = struct.unpack('>8s', bin_str)
print(result)
result = struct.unpack('>BBHL', bin_str)
print(result)
