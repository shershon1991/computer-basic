<?php

// 单例模式
class Singleton
{
    private static $_instance;

    /**
     * 防止从外部直接实例化
     * 要获取实例，必须通过 Singleton::getInstance() 方法获取实例
     */
    private function __construct()
    {
    }

    /**
     * 防止实例被克隆（这会创建实例的副本）
     */
    private function __clone()
    {
    }

    /**
     * 防止反序列化（这将创建它的副本）
     */
    private function __wakeup()
    {
    }

    public static function getInstance()
    {
        if (!(self::$_instance instanceof self)) {
            self::$_instance = new self();
        }

        return self::$_instance;
    }
}

$firstObj = Singleton::getInstance();
$secondObj = Singleton::getInstance();
var_dump($firstObj, $secondObj);
