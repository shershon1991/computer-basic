<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/2/14
 * Time: 10:53
 */

// 中介者模式
interface MediatorInterface
{
    function sendResponse($content);
    function makeRequest();
    function queryDb();
}

class Mediator implements MediatorInterface
{
    private $server;
    private $database;
    private $client;

    public function __construct($database, $client, $server)
    {
        $this->database = $database;
        $this->server = $server;
        $this->client = $client;
        $this->database->setMediator($this);
        $this->server->setMediator($this);
        $this->client->setMediator($this);
    }

    public function makeRequest()
    {
        $this->server->process();
    }

    public function queryDb()
    {
        return $this->database->getData();
    }

    public function sendResponse($content)
    {
        $this->client->output($content);
    }
}

abstract class Colleague
{
    protected $mediator;

    public function setMediator(MediatorInterface $mediator)
    {
        $this->mediator = $mediator;
    }
}

class Client extends Colleague
{
    public function request()
    {
        $this->mediator->makeRequest();
    }

    public function output($content)
    {
        echo $content;
    }
}

class Database extends Colleague
{
    public function getData()
    {
        return 'World';
    }
}

class Server extends Colleague
{
    public function process()
    {
        $data = $this->mediator->queryDb();
        $this->mediator->sendResponse(sprintf("Hello %s", $data));
    }
}

$client = new Client();
new Mediator(new Database(), $client, new Server());
$client->request();