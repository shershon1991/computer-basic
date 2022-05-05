<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/2/14
 * Time: 11:10
 */

// 策略模式
interface Strategy
{
    function doAction($money);
}

class ManJianStrategy implements Strategy
{
    public function doAction($money)
    {
        echo '满减算法：原价' . $money, '元' . PHP_EOL;
    }
}

class DaZheStrategy implements Strategy
{
    public function doAction($money)
    {
        echo '打折算法：原价' . $money, '元' . PHP_EOL;
    }
}

class StrategyFind
{
    private $strategy_mode;

    public function __construct($mode)
    {
        $this->strategy_mode = $mode;
    }

    public function get($money)
    {
        $this->strategy_mode->doAction($money);
    }
}

$mode1 = new StrategyFind(new ManJianStrategy());
$mode1->get(100);
$mode2 = new StrategyFind(new DaZheStrategy());
$mode2->get(100);
/*输出
满减算法：原价100元
打折算法：原价100元
 */