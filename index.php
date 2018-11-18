<?php

\spl_autoload_register(function ($class) {
    $classFilename = __DIR__ . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR
        . \str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';
    require $classFilename;
});

$categoryTV = new \OOPStore\Category('TV');
$product1 = new \OOPStore\Product($categoryTV, 'LG LX35', 1000000);
$product2 = new \OOPStore\Product($categoryTV, 'Samsung', 1000000);
$product3 = new \OOPStore\Product($categoryTV, 'Lenovo', 1000000);
$product4 = new \OOPStore\Product($categoryTV, 'Sony', 1000000);
$product5 = new \OOPStore\Product($categoryTV, 'Ericson', 1000000);
$store = new \OOPStore\Store();
$cart = new \OOPStore\Cart($store, new \OOPStore\Customer('Roman', 'Kopyl'));

$store->addProduct($product1);
$store->addProduct($product2);
$store->addProduct($product3);
$store->addProduct($product4);
// $store->addProduct($product5);

$store->removeProduct($product1);

$cart->addProduct($product2);
$cart->addProduct($product3);

$cart->removeProduct($product3);

$cart->addProduct($product5);

print_r($store->getProducts());
print_r($cart->getProducts());
