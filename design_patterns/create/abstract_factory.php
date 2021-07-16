<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/2/14
 * Time: 12:28
 */

// 抽象工厂模式
interface Product
{
    public function calculatePrice();
}

class ShippableProduct implements Product
{
    private $productPrice;
    private $shippingCosts;

    public function __construct($productPrice, $shippingCosts)
    {
        $this->productPrice = $productPrice;
        $this->shippingCosts = $shippingCosts;
    }

    public function calculatePrice()
    {
        return $this->productPrice + $this->shippingCosts;
    }
}

class DigitalProduct implements Product
{
    private $price;

    public function __construct($price)
    {
        $this->price = $price;
    }

    public function calculatePrice()
    {
        return $this->price;
    }
}

class ProductFactory
{
    const SHIPPING_COSTS = 50;

    public function createShippableProduct($price)
    {
        return new ShippableProduct($price, self::SHIPPING_COSTS);
    }

    public function createDigitalProduct($price)
    {
        return new DigitalProduct($price);
    }
}

$factory = new ProductFactory();
$product = $factory->createShippableProduct(150);
echo "ShippableProduct costs: " . $product->calculatePrice() . "<br>";
$product = $factory->createDigitalProduct(150);
echo "DigitalProduct costs: " . $product->calculatePrice() . "<br>";
