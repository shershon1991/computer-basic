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

    public function __clone() {}
}

class FooBookPrototype extends BookPrototype
{
    protected $category = 'Foo';

    public function __clone() {}
}

$barPrototype = new BarBookPrototype();
var_dump($barPrototype);
for ($i = 0; $i < 1; $i++) {
    $book = clone $barPrototype;
    $book->setTitle('Bar Book No ' . $i);
    var_dump($book);
}

$fooPrototype = new FooBookPrototype();
var_dump($fooPrototype);
for ($i = 0; $i < 1; $i++) {
    $book = clone $fooPrototype;
    $book->setTitle('Foo Book No ' . $i);
    var_dump($book);
}
/*输出
object(BarBookPrototype)#1 (2) {
  ["category":protected]=>
  string(3) "Bar"
  ["title":protected]=>
  NULL
}
object(BarBookPrototype)#2 (2) {
  ["category":protected]=>
  string(3) "Bar"
  ["title":protected]=>
  string(13) "Bar Book No 0"
}
 */