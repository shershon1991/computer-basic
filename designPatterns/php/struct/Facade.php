<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/3/15
 * Time: 19:27
 */

// 门面模式
interface OsInterface
{
    public function halt();

    public function getName();
}

interface BiosInterface
{
    public function execute();

    public function waitForKeyPress();

    public function launch(OsInterface $os);

    public function powerDown();
}

class Os implements OsInterface
{
    public function halt()
    {
        echo "停止中..." . PHP_EOL;
    }

    public function getName()
    {
        return "os";
    }
}

class Bios implements BiosInterface
{
    public function execute()
    {
        echo "执行中..." . PHP_EOL;
    }

    public function waitForKeyPress()
    {
        echo "等待按压..." . PHP_EOL;
    }

    public function launch(OsInterface $os)
    {
        echo "启动" . $os->getName() . "..." . PHP_EOL;
    }

    public function powerDown()
    {
        echo "关闭..." . PHP_EOL;
    }
}

class Facade
{
    private $os;
    private $bios;

    public function __construct(BiosInterface $bios, OsInterface $os)
    {
        $this->bios = $bios;
        $this->os = $os;
    }

    public function turnOn()
    {
        $this->bios->execute();
        $this->bios->waitForKeyPress();
        $this->bios->launch($this->os);
    }

    public function turnOff()
    {
        $this->os->halt();
        $this->bios->powerDown();
    }
}

$os = new Os();
$bios = new Bios();
$facade = new Facade($bios, $os);
$facade->turnOn();
$facade->turnOff();
