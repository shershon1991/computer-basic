<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/2/14
 * Time: 12:28
 */

// 建造者模式
interface BuilderInterface
{
    public function createVehicle();
    public function addDoors();
    public function addEngine();
    public function addWheel();
    public function getVehicle();
}

class TruckBuilder implements BuilderInterface
{
    private $truck;

    public function createVehicle()
    {
        $this->truck = new Truck();
    }

    public function addDoors()
    {
        $this->truck->setPart('leftDoor', new Door());
        $this->truck->setPart('rightDoor', new Door());
    }

    public function addEngine()
    {
        $this->truck->setPart('truckEngine', new Engine());
    }

    public function addWheel()
    {
        $this->truck->setPart('wheel1', new Wheel());
        $this->truck->setPart('wheel2', new Wheel());
        $this->truck->setPart('wheel3', new Wheel());
        $this->truck->setPart('wheel4', new Wheel());
        $this->truck->setPart('wheel5', new Wheel());
        $this->truck->setPart('wheel6', new Wheel());
    }

    public function getVehicle()
    {
        return $this->truck;
    }
}

class CarBuilder implements BuilderInterface
{
    private $car;

    public function createVehicle()
    {
        $this->car = new Car();
    }

    public function addDoors()
    {
        $this->car->setPart('leftDoor', new Door());
        $this->car->setPart('rightDoor', new Door());
        $this->car->setPart('trunkLid', new Door());
    }

    public function addEngine()
    {
        $this->car->setPart('carEngine', new Engine());
    }

    public function addWheel()
    {
        $this->car->setPart('wheelLF', new Wheel());
        $this->car->setPart('wheelRF', new Wheel());
        $this->car->setPart('wheelLR', new Wheel());
        $this->car->setPart('wheelRR', new Wheel());
    }

    public function getVehicle()
    {
        return $this->car;
    }
}

abstract class Vehicle
{
    public $data = [];

    public function setPart($key, $value)
    {
        $this->data[$key] = $value;
    }
}

class Truck extends Vehicle
{
}

class Car extends Vehicle
{
}

class Door
{
}

class Engine
{
}

class Wheel
{
}

class Director
{
    public function build(BuilderInterface $builder)
    {
        $builder->createVehicle();
        $builder->addDoors();
        $builder->addEngine();
        $builder->addWheel();

        return $builder->getVehicle();
    }
}

/*$truckBuilder = new TruckBuilder();
$newVehicle = (new Director())->build($truckBuilder);
print_r($newVehicle->data);*/

$carBuilder = new CarBuilder();
$newVehicle = (new Director())->build($carBuilder);
print_r($newVehicle->data);



