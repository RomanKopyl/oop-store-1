<?php

namespace OOPStore;

interface ProductInterface
{
    public function getId();
    public function setPrice($price): bool;
    public function getPrice(): int;
    public function getCategory(): Category;
}