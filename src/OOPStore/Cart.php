<?php

namespace OOPStore;

class Cart implements CartInterface
{
    private $store;
    private $customer;
    private $products;
    private $purchase;

    public function __construct(Store $store, Customer $customer)
    {
        $this->store = $store;
        $this->customer = $customer;
        $this->products = [];
    }

    public function getCustomer(): Customer
    {
        return $this->customer;
    }

    public function addProduct(Product $product): bool
    {
        if (empty($this->purchase) && $this->store->hasProduct($product)) { //
           $this->products[$product->getId()] = $product;
           $this->store->removeProduct($product);
           return true;
        }
        return false;
    }
    
    public function removeProduct (Product $product)
    {
        if (($key = array_search($product, $this->products)) !== false) {
            unset($this->products[$key]);
            $this->store->addProduct($product);
        }
    }

    public function getTotal(): int
    {
        $total = 0;

        foreach ($this->products as $product) {
            $total += $product->getPrice();
        }

        return $total;
    }

    public function createPurchase(): Purchase
    {
        $this->purchase = new Purchase($this);
        return $this->purchase;
    }

    public function getProducts(): array
    {
        return $this->products;
    }

    public function hasProduct(Product $product): bool
    {
        return isset($this->products[$product->getId()]);
    }
}
