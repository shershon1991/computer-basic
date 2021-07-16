<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/2/14
 * Time: 12:28
 */

// 原型模式
abstract class BookPrototype
{
    protected $title;
    protected $category;

    abstract public function __clone();

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getTitle()
    {
        return $this->title;
    }
}

class BarBookPrototype extends BookPrototype
{
    protected $category = 'Bar';

    public function __clone()
    {
    }
}

class FooBookPrototype extends BookPrototype
{
    protected $category = 'Foo';

    public function __clone()
    {
    }
}

/*$fooPrototype = new FooBookPrototype();
var_dump($fooPrototype);
for ($i = 0; $i < 10; $i++) {
    $book = clone $fooPrototype;
    $book->setTitle('Foo Book No ' . $i);
    var_dump($book);
}*/
$barPrototype = new BarBookPrototype();
var_dump($barPrototype);
for ($i = 0; $i < 5; $i++) {
    $book = clone $barPrototype;
    $book->setTitle('Bar Book No ' . $i);
    var_dump($book);
}