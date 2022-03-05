<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/2/14
 * Time: 10:53
 */

// 迭代器模式
class Book
{
    private $author;
    private $title;

    public function __construct($title, $author)
    {
        $this->author = $author;
        $this->title = $title;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getAuthorAndTitle()
    {
        return $this->getTitle() . ' by ' . $this->getAuthor();
    }
}

class BookList implements \Countable, \Iterator
{
    private $books = [];
    private $currentIndex = 0;

    public function addBook($book)
    {
        $this->books[] = $book;
    }

    public function removeBook($bookToRemove)
    {
        foreach ($this->books as $key => $book) {
            if ($book->getAuthorAndTitle() === $bookToRemove->getAuthorAndTitle()) {
                unset($this->books[$key]);
            }
        }
        $this->books = array_values($this->books);
    }

    public function count()
    {
        return count($this->books);
    }

    public function current()
    {
        return $this->books[$this->currentIndex];
    }

    public function key()
    {
        return $this->currentIndex;
    }

    public function next()
    {
        $this->currentIndex++;
    }

    public function rewind()
    {
        $this->currentIndex = 0;
    }

    public function valid()
    {
        return isset($this->books[$this->currentIndex]);
    }
}

$bookList = new BookList();
$bookList->addBook(new Book('《Learning PHP Design Patterns》', 'William Sanders'));
$bookList->addBook(new Book('《Professional Php Design Patterns》', 'Aaron Saray'));
$bookList->addBook(new Book('《Clean Code》', 'Robert C. Martin'));
$books = [];
foreach ($bookList as $book) {
    $books[] = $book->getAuthorAndTitle();
}
print_r($books);
/*输出
Array
(
    [0] => 《Learning PHP Design Patterns》 by William Sanders
    [1] => 《Professional Php Design Patterns》 by Aaron Saray
    [2] => 《Clean Code》 by Robert C. Martin
)
 */
