<?php

class Usable
{
    var $id;
    var $name;
    var $stock;
    var $price;
    var $imageURL;
    var $description;

    public function __construct($id, $name, $stock, $price, $imageURL, $description){
        $this->id = $id;
        $this->name = $name;
        $this->stock = $stock;
        $this->price = $price;
        $this->imageURL = $imageURL;
        $this->description = $description;
    }
}