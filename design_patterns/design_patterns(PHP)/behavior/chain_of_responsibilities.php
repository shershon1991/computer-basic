<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/3/15
 * Time: 19:27
 */

// 责任链模式
abstract class Handler
{
    private $successor;

    public function __construct($handler = NULL)
    {
        $this->successor = $handler;
    }

    final public function handle($request)
    {
        $processed = $this->processing($request);
        if ($processed === NULL) {
            // 请求尚未被目前的处理器处理 => 传递到下一个处理器。
            if ($this->successor !== NULL) {
                $processed = $this->successor->handle($request);
            }
        }
        return $processed;
    }

    abstract protected function processing($request);
}

class HttpInMemoryCacheHandler extends Handler
{
    private $data;

    public function __construct($data, $successor = NULL)
    {
        parent::__construct($successor);
        $this->data = $data;
    }

    protected function processing($request)
    {
        $key = sprintf(
            '%s?%s',
            $request->getUri()->getPath(),
            $request->getUri()->getQuery()
        );
        if ($request->getMethod() == 'GET' && isset($this->data[$key])) {
            return $this->data[$key];
        }
        return NULL;
    }
}

class SlowDatabaseHandler extends Handler
{
    protected function processing($request)
    {
        return 'Hello World!';
    }
}