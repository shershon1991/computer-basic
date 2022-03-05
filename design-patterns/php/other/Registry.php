<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/3/15
 * Time: 19:27
 */

// 注册模式
abstract class Registry
{
    const LOGGER = 'logger';
    private static $storedValues = [];
    private static $allowedKeys = [
        self::LOGGER,
    ];

    static public function set($key, $value)
    {
        if (!in_array($key, self::$allowedKeys)) {
            throw new \Exception('Invalid key given');
        }
        self::$storedValues[$key] = $value;
    }

    static public function get($key)
    {
        if (!in_array($key, self::$allowedKeys) || !isset(self::$storedValues[$key])) {
            throw new \Exception('Invalid key given');
        }
        return self::$storedValues[$key];
    }
}

$key = Registry::LOGGER;
$logger = new stdClass();
Registry::set($key, $logger);
$storedLogger = Registry::get($key);
print_r($storedLogger);
/*输出
stdClass Object
(
)
 */