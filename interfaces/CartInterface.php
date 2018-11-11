<?php

namespace OOPStore;

interface CartInterface
{
    public function getCustomer(): Customer;
    public function addProduct(Product $product): bool;
    public function getTotal(): int;
    public function createPurchase(): Purchase;
}
