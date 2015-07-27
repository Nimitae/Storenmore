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

    public function __construct($id, $goodsID, $username, $orderType, $priceType, $price, $quantity, $orderTimestamp, $status, $statusTimestamp)
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
    }
}