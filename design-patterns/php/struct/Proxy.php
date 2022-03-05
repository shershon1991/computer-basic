<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/3/15
 * Time: 19:27
 */

// 代理模式
class Record
{
    private $data;

    public function __construct($data = [])
    {
        $this->data = $data;
    }

    public function __set($name, $value)
    {
        $this->data[$name] = $value;
    }

    public function __get($name)
    {
        if (!isset($this->data[$name])) {
            throw new Exception('Invalid name given');
        }
        return $this->data[$name];
    }
}

class RecordProxy extends Record
{
    private $isDirty = false;
    private $isInitialized = false;

    public function __construct($data)
    {
        parent::__construct($data);
        // 当记录有数据的时候，将 initialized 标记为 true ，
        // 因为记录将保存我们的业务逻辑，我们不希望在 Record 类里面实现这个行为
        // 而是在继承了 Record 的代理类中去实现。
        if (count($data) > 0) {
            $this->isInitialized = true;
            $this->isDirty = true;
        }
    }

    public function __set($name, $value)
    {
        $this->isDirty = true;
        parent::__set($name, $value);
    }

    public function isDirty()
    {
        return $this->isDirty;
    }
}

$data = [];
$proxy = new RecordProxy($data);
$proxy->name = "张三";
var_dump($proxy);
/*输出
object(RecordProxy)#1 (3) {
  ["isDirty":"RecordProxy":private]=>
  bool(true)
  ["isInitialized":"RecordProxy":private]=>
  bool(false)
  ["data":"Record":private]=>
  array(1) {
    ["name"]=>
    string(6) "张三"
  }
}
 */