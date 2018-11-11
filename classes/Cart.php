<?php

namespace OOPStore;

class Cart implements CartInterface
{
    private $customer;
    private $products;
    private $purchase;

    public function __construct(Customer $customer)
    {
        $this->customer = $customer;
        $this->products = [];
    }

    public function getCustomer(): Customer
    {
        return $this->customer;
    }

    public function addProduct(Product $product): bool
    {
        if (empty($this->purchase)) {
           $this->products[] = $product;
           return true;
        }
        return false;
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
}
