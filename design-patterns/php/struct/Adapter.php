<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/2/14
 * Time: 12:28
 */

// 适配器模式
interface BookInterface
{
    public function open();

    public function turnPage();

    public function getPage();
}

class Book implements BookInterface
{
    private $page;

    public function open()
    {
        $this->page = 1;
    }

    public function turnPage()
    {
        $this->page++;
    }

    public function getPage()
    {
        return $this->page;
    }
}

interface EBookInterface
{
    public function unlock();

    public function pressNext();

    public function getPage();
}

class Kindle implements EBookInterface
{
    private $page = 1;
    private $totalPages = 100;

    public function unlock()
    {
    }

    public function pressNext()
    {
        $this->page++;
    }

    public function getPage()
    {
        return [$this->page, $this->totalPages];
    }
}

class EBookAdapter implements BookInterface
{
    protected $eBook;

    public function __construct(EBookInterface $eBook)
    {
        $this->eBook = $eBook;
    }

    public function open()
    {
        $this->eBook->unlock();
    }

    public function turnPage()
    {
        $this->eBook->pressNext();
    }

    public function getPage()
    {
        return $this->eBook->getPage()[0];
    }
}

$book = new Book();
$book->open();
$book->turnPage();
echo $book->getPage() . PHP_EOL;
$kindle = new Kindle();
$book = new EBookAdapter($kindle);
$book->open();
$book->turnPage();
echo $book->getPage() . PHP_EOL;
/*输出
2
2
 */
