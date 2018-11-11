<?php

namespace OOPStore;

define('CLASSES_DIR', __DIR__ . DIRECTORY_SEPARATOR . 'classes');
define('INTERFACES_DIR', __DIR__ . DIRECTORY_SEPARATOR . 'interfaces');

function requireDir($dir)
{
    // http://php.net/manual/en/function.dir.php
    $d = dir($dir);
    while (false !== ($classFile = $d->read())) {
        if ($classFile === '.' || $classFile === '..') {
            continue;
        }
        require_once($dir . DIRECTORY_SEPARATOR . $classFile); 
    }
}

requireDir(INTERFACES_DIR);
requireDir(CLASSES_DIR);

$categoryTV = new Category('TV');
$product1 = new Product($categoryTV, 'LG LX35', 1000000);
$product2 = new Product($categoryTV, 'Samsung', 1000000);
$product3 = new Product($categoryTV, 'Lenovo', 1000000);
$product4 = new Product($categoryTV, 'Sony', 1000000);
$product5 = new Product($categoryTV, 'Ericson', 1000000);
$store = new Store();
$cart = new Cart($store, new Customer('Roman', 'Kopyl'));

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
