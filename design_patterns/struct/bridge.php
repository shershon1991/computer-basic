<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/2/14
 * Time: 12:28
 */

// 桥梁模式
interface FormatterInterface {
    public function format($text);
}

class PlainTextFormatter implements FormatterInterface {
    public function format($text) {
        return $text;
    }
}

class HtmlFormatter implements FormatterInterface {
    public function format($text) {
        return sprintf('<h1>%s</h1>', $text);
    }
}

abstract class Service {
    protected $implementation;

    public function __construct(FormatterInterface $printer)
    {
        $this->implementation = $printer;
    }

    public function setImplementation(FormatterInterface $printer) {
        $this->implementation = $printer;
    }

    abstract public function get();
}

class HelloWorldService extends Service {
    public function get() {
        return $this->implementation->format('Hello World');
    }
}

$service = new HelloWorldService(new PlainTextFormatter());
echo $service->get();

/*$service = new HelloWorldService(new HtmlFormatter());
echo $service->get();*/