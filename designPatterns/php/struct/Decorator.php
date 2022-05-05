<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/2/14
 * Time: 12:28
 */

// 装饰模式
interface RenderableInterface
{
    public function renderData();
}

class Webservice implements RenderableInterface
{
    private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function renderData()
    {
        return $this->data;
    }
}

abstract class RendererDecorator implements RenderableInterface
{
    protected $wrapped;

    public function __construct(RenderableInterface $renderer)
    {
        $this->wrapped = $renderer;
    }

    abstract function renderData();
}

class XmlRenderer extends RendererDecorator
{
    public function renderData()
    {
        $doc = new DOMDocument();
        $data = $this->wrapped->renderData();
        $doc->appendChild($doc->createElement('content', $data));
        return $doc->saveXML();
    }
}

class JsonRenderer extends RendererDecorator
{
    public function renderData()
    {
        return json_encode($this->wrapped->renderData());
    }
}

$webser = new Webservice('foobar');
$service = new XmlRenderer($webser);
echo $service->renderData() . PHP_EOL;

$webser = new Webservice(['name' => 'Shershon', 'age' => 29, 'sex' => 'man']);
$service = new JsonRenderer($webser);
echo $service->renderData() . PHP_EOL;
/*输出
<?xml version="1.0"?>
<content>foobar</content>

{"name":"Shershon","age":29,"sex":"man"}
 */