<?php

class Sender
{
    public function __construct(iWithCustomer $cart)
    {
        $this->cart = $cart;
    }

    public function send()
    {
        $customer = $this->cart->getCustomer();
        mail($customer->mail);
    }
}