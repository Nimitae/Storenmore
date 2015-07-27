<?php

class Uploaded
{
    var $id;
    var $name;
    var $imageURL;
    var $username;
    var $realPrice;
    var $mesoPrice;
    var $uploadTimestamp;
    var $status;
    var $statusTimestamp;
    var $description;

    public function __construct($id, $name, $imageURL, $username, $realPrice, $mesoPrice, $uploadTimestamp, $status, $statusTimestamp,$description )
    {
        $this->id = $id;
        $this->name = $name;
        $this->imageURL = $imageURL;
        $this->username = $username;
        $this->realPrice = $realPrice;
        $this->mesoPrice = $mesoPrice;
        $this->uploadTimestamp = $uploadTimestamp;
        $this->description = $description;
        $this->status = $status;
        $this->statusTimestamp = $statusTimestamp;
    }
}