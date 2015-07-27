<?php

class Reputation
{
    var $id;
    var $fromUser;
    var $toUser;
    var $message;
    var $value;
    var $timestamp;

    public function __construct($id, $fromUser, $toUser, $message, $value, $timestamp)
    {
        $this->id = $id;
        $this->fromUser = $fromUser;
        $this->toUser = $toUser;
        $this->value = $value;
        $this->message = $message;
        $this->timestamp = $timestamp;
    }
}