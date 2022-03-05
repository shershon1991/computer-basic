<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/2/14
 * Time: 10:53
 */

// 备忘录模式
class Memento
{
    private $state;

    public function __construct(State $stateToSave)
    {
        $this->state = $stateToSave;
    }

    public function getState()
    {
        return $this->state;
    }
}

class State
{
    private $state;
    const STATE_CREATED = 'created';
    const STATE_OPENED = 'opened';
    const STATE_ASSIGNED = 'assigned';
    const STATE_CLOSED = 'closed';
    static private $validStates = [
        self::STATE_CREATED,
        self::STATE_OPENED,
        self::STATE_ASSIGNED,
        self::STATE_CLOSED,
    ];

    public function __construct($state)
    {
        self::ensureIsValidState($state);
        $this->state = $state;
    }

    static private function ensureIsValidState($state)
    {
        if (!in_array($state, self::$validStates)) {
            throw new \InvalidArgumentException('Invalid state given');
        }
    }

    public function __toString()
    {
        return $this->state;
    }
}

class Ticket
{
    private $currentState;

    public function __construct()
    {
        $this->currentState = new State(State::STATE_CREATED);
    }

    public function open()
    {
        $this->currentState = new State(State::STATE_OPENED);
    }

    public function assign()
    {
        $this->currentState = new State(State::STATE_ASSIGNED);
    }

    public function close()
    {
        $this->currentState = new State(State::STATE_CLOSED);
    }

    public function saveToMemento()
    {
        return new Memento(clone $this->currentState);
    }

    public function restoreFromMemento(Memento $memento)
    {
        $this->currentState = $memento->getState();
    }

    public function getState()
    {
        return $this->currentState;
    }
}

$ticket = new Ticket();
// 打开 ticket
$ticket->open();
$openedState = $ticket->getState();
var_dump(State::STATE_OPENED == (string)$ticket->getState());
// 存入备忘录
$memento = $ticket->saveToMemento();
// 分配 ticket
$ticket->assign();
var_dump(State::STATE_ASSIGNED == (string)$ticket->getState());
// 现在已经恢复到已打开的状态，但需要验证是否已经克隆了当前状态作为副本
$ticket->restoreFromMemento($memento);
var_dump(State::STATE_OPENED == (string)$ticket->getState());
var_dump($openedState == $ticket->getState());
/*输出
bool(true)
bool(true)
bool(true)
bool(true)
 */