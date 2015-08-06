<?php

class Order
{
    var $id;
    var $goodsID;
    var $username;
    var $orderType;
    var $priceType;
    var $price;
    var $quantity;
    var $orderTimestamp;
    var $status;
    var $statusTimestamp;
    var $serverID;

    public function __construct($id, $goodsID, $username, $orderType, $priceType, $price, $quantity, $orderTimestamp, $status, $statusTimestamp, $serverID)
    {
        $this->id = $id;
        $this->goodsID = $goodsID;
        $this->username = $username;
        $this->orderType = $orderType;
        $this->priceType = $priceType;
        $this->price = $price;
        $this->quantity = $quantity;
        $this->orderTimestamp = $orderTimestamp;
        $this->status = $status;
        $this->statusTimestamp = $statusTimestamp;
        $this->serverID = $serverID;
    }
}