<?php


/***************************************************************************
 *
 * Copyright (c) 2021 doushen.com, Inc. All Rights Reserved
 *
 **************************************************************************/

// 观察者模式
interface Subject
{
    // 添加订阅关系
    public function attach($name, $observer);

    // 移除订阅关系
    public function detach($name);

    // 通知订阅者
    public function notifyObservers(string $msg);
}

class ConcreteSubject implements Subject
{
    private $observers = [];

    // 添加订阅关系
    public function attach($name, $observer)
    {
        $this->observers[$name] = $observer;
    }

    // 移除订阅关系
    public function detach($name)
    {
        unset($this->observers[$name]);
    }

    // 通知订阅者
    public function notifyObservers(string $msg)
    {
        foreach ($this->observers as $observer) {
            $observer->update($msg);
        }
    }
}

interface Observer
{
    public function update(string $msg);
}

class FriendOneObserver implements Observer
{
    public function update(string $msg)
    {
        echo "FriendOne 知道你发动态了，" . $msg . PHP_EOL;
    }
}

class FriendTwoObserver implements Observer
{
    public function update(string $msg)
    {
        echo "FriendTwo 知道你发动态了，" . $msg . PHP_EOL;
    }
}

$subject = new ConcreteSubject();
$subject->attach('friendOne', new FriendOneObserver());
$subject->attach('friendTwo', new FriendTwoObserver());
$subject->notifyObservers("第一个朋友圈消息");
$subject->detach('friendTwo');
$subject->notifyObservers("第二个朋友圈消息");
/*输出
FriendOne 知道你发动态了，第一个朋友圈消息
FriendTwo 知道你发动态了，第一个朋友圈消息
FriendOne 知道你发动态了，第二个朋友圈消息
 */