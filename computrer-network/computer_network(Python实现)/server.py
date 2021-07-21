# -*- encoding=utf-8 -*-


import json
import socket
import sys
sys.path.append("C:\\Users\\18810\\PycharmProjects")
from operate_system.pool import ThreadPool as tp
from operate_system.task import AsyncTask

from computer_network.processor.net.parser import IPParser
from computer_network.processor.trans.parser import UDPParser, TCPParser


class ProcessTask(AsyncTask):
    def __init__(self, packet, *args, **kwargs):
        self.packet = packet
        # AsyncTask(func=self.process, *args, **kwargs)
        super(ProcessTask, self).__init__(func=self.process, *args, **kwargs)

    def process(self):
        headers = {
            'network_header': None,
            'transport_header': None
        }
        ip_header = IPParser.parse(self.packet)
        headers['network_header'] = ip_header
        if ip_header['protocol'] == 17:
            udp_header = UDPParser.parse(self.packet)
            headers['transport_header'] = udp_header
        elif ip_header['protocol'] == 6:
            tcp_header = TCPParser.parse(self.packet)
            headers['transport_header'] = tcp_header
        return headers
    pass


class Server:

    def __init__(self):
        # 工作协议类型、套接字类型、工作具体的协议
        self.sock = socket.socket(socket.AF_INET, socket.SOCK_RAW,
                                  socket.IPPROTO_IP)
        # 更改为自己的主机IP
        self.ip = '10.3.139.53'
        self.port = 80
        self.sock.bind((self.ip, self.port))

        # 混杂模式
        # self.sock.ioctl(socket.SIO_RCVALL, socket.RCVALL_ON)

        self.pool = tp(10)
        self.pool.start()

    def loop_serve(self):
        while True:
            packet, addr = self.sock.recvfrom(65535)
            task = ProcessTask(packet)
            self.pool.put(task)
            result = task.get_result()
            result = json.dumps(
                result,
                indent=4
            )
            print(result)
        pass


if __name__ == '__main__':
    server = Server()
    server.loop_serve()
