<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/3/15
 * Time: 19:27
 */

// 享元模式
interface FlyweightInterface
{
    public function render($extrinsicState);
}

class CharacterFlyweight implements FlyweightInterface
{
    private $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function render($font)
    {
        return sprintf('Character %s with font %s' . PHP_EOL, $this->name, $font);
    }
}

class FlyweightFactory implements \Countable
{
    private $pool = [];

    public function get($name)
    {
        if (!isset($this->pool[$name])) {
            $this->pool[$name] = new CharacterFlyweight($name);
        }

        return $this->pool[$name];
    }

    public function count()
    {
        return count($this->pool);
    }
}

$characters = ['a', 'b', 'c'];
$fonts = ['Arial', 'Times New Roman'];
$factory = new FlyweightFactory();
foreach ($characters as $char) {
    foreach ($fonts as $font) {
        $flyweight = $factory->get($char);
        $rendered = $flyweight->render($font);
        echo $rendered;
    }
}
/*输出
Character a with font Arial
Character a with font Times New Roman
Character b with font Arial
Character b with font Times New Roman
Character c with font Arial
Character c with font Times New Roman
 */
