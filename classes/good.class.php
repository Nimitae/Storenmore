<?php

class Good
{
    var $id;
    var $name;
    var $imageURL;
    var $description;
    var $buyOrdersContainer;
    var $sellOrdersContainer;

    public function __construct($id, $name, $imageURL, $description)
    {
        $this->id = $id;
        $this->name = $name;
        $this->imageURL = $imageURL;
        $this->description = $description;
        $this->buyOrdersContainer = array();
        $this->sellOrdersContainer = array();
    }
}