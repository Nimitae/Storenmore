<?php

class Equipment
{
    var $id;
    var $description;
    var $price;
    var $status;
    var $class;
    var $url;
    var $tags;

    function __construct($id, $description, $price, $status, $class, $url)
    {
        $this->id = $id;
        $this->description = $description;
        $this->price = $price;
        $this->status = $status;
        $this->class = $class;
        $this->url = $url;
        $this->tags = array();
    }
}