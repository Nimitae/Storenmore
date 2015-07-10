<?php

class Crafting
{
    var $id;
    var $name;
    var $stock;
    var $price;
    var $imageURL;

    public function __construct($id, $name, $stock, $price, $imageURL){
        $this->id = $id;
        $this->name = $name;
        $this->stock = $stock;
        $this->price = $price;
        $this->imageURL = $imageURL;
    }
}