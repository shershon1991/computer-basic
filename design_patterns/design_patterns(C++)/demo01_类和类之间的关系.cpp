#include <iostream>
using namespace std;

class Car;
class ZhangSan
{
public:
          void GoWork(Car *p)
          {
          }
};

class Car
{
};

class AdvZhangSan
{
public:
          void GoWork()
          {
                    // m_car...
          }

private:
          Car *m_car;
};

//类与类之间的关系：
// 实现	          （空心三角箭头+虚线）
// 继承/泛华	 （空心三角箭头+实线）
// 依赖		（普通箭头+虚线）：一个类是另一个类的函数参数或者返回值，这种关系是偶然性的、临时性的、非常弱的。
// 关联		（普通箭头+实线）：一个类是另一个类的成员属性（聚合、组合是特殊的关联关系），这种关系是必然的、长期的、强烈的
// 聚合		（空心菱形箭头+实线）：整体和部分的关系，这种整体和部分可以分离，例如：汽车和发动机（汽车可以选择各个型号的发动机）
// 组合		（实心菱形箭头+实线）：生命体的整体和部分的关系，例如：人和五脏六腑
int main101()
{
          cout << "hello..." << endl;

          return 0;
}
