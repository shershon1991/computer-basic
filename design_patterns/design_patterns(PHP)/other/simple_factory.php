<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/2/14
 * Time: 12:28
 */

// 简单工厂模式
class SimpleFactory
{
    public function createBicycle()
    {
        return new Bicycle();
    }
}

class Bicycle
{
    public function driveTo($destination)
    {
    }
}

$factory = new SimpleFactory();
$bicycle = $factory->createBicycle();
$bicycle->driveTo('Paris');