<?php

// 工厂模式
interface InterfaceShape {

    function getArea();

    function getCircumference();

}

class Rectangle implements InterfaceShape {

    private $_width;

    private $_height;

    public function __construct($width, $height) {
        $this->_width = $width;
        $this->_height = $height;
    }

    public function getArea() {
        return $this->_width * $this->_height;
    }

    public function getCircumference() {
        return 2 * ($this->_width + $this->_height);
    }

}

class Circle implements InterfaceShape {

    private $_radius;

    public function __construct($radius) {
        $this->_radius = $radius;
    }

    public function getArea() {
        return M_PI * pow($this->_radius, 2);
    }

    public function getCircumference() {
        return 2 * M_PI * $this->_radius;
    }

}

class FactoryShape {

    public static function create() {
        switch(func_num_args()) {
            case 1:
                return new Circle(func_get_arg(0));
            case 2:
                return new Rectangle(func_get_arg(0), func_get_arg(1));
            default:
                break;
        }
    }

}

$rect = FactoryShape::create(5 ,5);
var_dump($rect, $rect->getArea(), $rect->getCircumference());

$circle = FactoryShape::create(4);
var_dump($circle, $circle->getArea(), $circle->getCircumference());