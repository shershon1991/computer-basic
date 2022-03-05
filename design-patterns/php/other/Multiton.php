<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/2/14
 * Time: 12:28
 */

// 多例模式
final class Multiton
{
    const INSTANCE_1 = '1';
    const INSTANCE_2 = '2';

    /**
     * @var 实例数组
     */
    private static $instances = [];

    /**
     * 这里私有方法阻止用户随意的创建该对象实例
     */
    private function __construct()
    {
    }

    public static function getInstance($instanceName)
    {
        if (!isset(self::$instances[$instanceName])) {
            self::$instances[$instanceName] = new self();
        }

        return self::$instances[$instanceName];
    }

    /**
     * 该私有对象阻止实例被克隆
     */
    private function __clone()
    {
    }

    /**
     * 该私有方法阻止实例被序列化
     */
    private function __wakeup()
    {
    }
}

