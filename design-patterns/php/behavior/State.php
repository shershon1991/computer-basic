<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/2/14
 * Time: 10:53
 */

// 状态模式
abstract class StateOrder
{
    private $details;
    static protected $state;

    abstract protected function done();

    protected function setStatus($status)
    {
        $this->details['status'] = $status;
        $this->details['updatedTime'] = time();
    }

    protected function getStatus()
    {
        return $this->details['status'];
    }
}

class ShippingOrder extends StateOrder
{
    public function __construct()
    {
        $this->setStatus('shipping');
    }

    protected function done()
    {
        $this->setStatus('completed');
    }
}

class ContextOrder extends StateOrder
{
    public function getState()
    {
        return static::$state;
    }

    public function setState(StateOrder $state)
    {
        static::$state = $state;
    }

    public function done()
    {
        static::$state->done();
    }

    public function getStatus()
    {
        return static::$state->getStatus();
    }
}

class CreateOrder extends StateOrder
{
    public function __construct()
    {
        $this->setStatus('created');
    }

    protected function done()
    {
        static::$state = new ShippingOrder();
    }
}

$order = new CreateOrder();
$contextOrder = new ContextOrder();
$contextOrder->setState($order);
$contextOrder->done();
echo $contextOrder->getStatus() . PHP_EOL;
// shipping