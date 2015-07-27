<?php

class Uploaded
{
    var $id;
    var $name;
    var $imageURL;
    var $username;
    var $priceType;
    var $price;
    var $uploadTimestamp;
    var $status;
    var $statusTimestamp;
    var $description;

    public function __construct($id, $name, $imageURL, $username, $priceType, $price, $uploadTimestamp, $status, $statusTimestamp,$description )
    {
        $this->id = $id;
        $this->name = $name;
        $this->imageURL = $imageURL;
        $this->username = $username;
        $this->priceType = $priceType;
        $this->price = $price;
        $this->uploadTimestamp = $uploadTimestamp;
        $this->description = $description;
        $this->status = $status;
        $this->statusTimestamp = $statusTimestamp;
    }
}