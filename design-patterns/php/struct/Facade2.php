<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/3/15
 * Time: 19:27
 */

// 门面模式
// 开启和关闭网站
class WebSet
{
    public function start()
    {
        echo '开启网站...' . PHP_EOL;
    }

    public function stop()
    {
        echo '关闭网站...' . PHP_EOL;
    }
}

// 开启和关闭博客
class BlogSet
{
    public function start()
    {
        echo '开启博客...' . PHP_EOL;
    }

    public function stop()
    {
        echo '关闭博客...' . PHP_EOL;
    }
}

// 开启和关闭注册
class RegisterSet
{
    public function start()
    {
        echo '开启注册...' . PHP_EOL;
    }

    public function stop()
    {
        echo '关闭注册...' . PHP_EOL;
    }
}

class Facade2
{
    private $_webSet;
    private $_blogSet;
    private $_registerSet;

    public function __construct()
    {
        $this->_webSet = new WebSet();
        $this->_blogSet = new BlogSet();
        $this->_registerSet = new RegisterSet();
    }

    public function tureOn()
    {
        $this->_webSet->start();
        $this->_blogSet->start();
        $this->_registerSet->start();
    }

    public function tureOff()
    {
        $this->_webSet->stop();
        $this->_blogSet->stop();
        $this->_registerSet->stop();
    }
}

$facade = new Facade2();
$facade->tureOn();
/*输出
开启网站...
开启博客...
开启注册...
 */