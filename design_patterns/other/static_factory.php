<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/2/14
 * Time: 12:28
 */

// 静态工厂模式
interface FormatInterface
{
}

class FormatString implements FormatInterface
{
}

class FormatNumber implements FormatInterface
{
}

final class StaticFactory
{
    public static function factory($type)
    {
        if ($type == 'number') {
            return new FormatNumber();
        }
        if ($type == 'string') {
            return new FormatString();
        }
    }
}
