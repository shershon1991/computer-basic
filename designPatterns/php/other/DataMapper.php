<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/2/14
 * Time: 12:28
 */

// 数据映射模式
class User
{
    private $username;
    private $email;

    public static function fromState($state)
    {
        return new self(
            $state['username'],
            $state['email']
        );
    }

    public function __construct($username, $email)
    {
        $this->username = $username;
        $this->email = $email;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getEmail()
    {
        return $this->email;
    }
}

class UserMapper
{
    private $adapter;

    public function __construct($storage)
    {
        $this->adapter = $storage;
    }

    public function findById($id)
    {
        $result = $this->adapter->find($id);
        if ($result === null) {
            throw new Exception("User #$id not found");
        }
        return $this->mapRowToUser($result);
    }

    private function mapRowToUser($row)
    {
        return User::fromState($row);
    }
}

class StorageAdapter
{
    private $data = [];

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function find($id)
    {
        if (isset($this->data[$id])) {
            return $this->data[$id];
        }
        return null;
    }
}

$storage = new StorageAdapter([1 => ['username' => 'domnikl', 'email' => 'liebler.dominik@gmail.com']]);
$mapper = new UserMapper($storage);
$user = $mapper->findById(1);
print_r($user);
/*输出
User Object
(
    [username:User:private] => domnikl
    [email:User:private] => liebler.dominik@gmail.com
)
 */
