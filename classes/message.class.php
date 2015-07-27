<?php

class Message
{
    var $id;
    var $fromUser;
    var $toUser;
    var $status;
    var $message;
    var $timestamp;

    public function __construct($id, $fromUser, $toUser, $status, $message, $timestamp)
    {
        $this->id = $id;
        $this->fromUser = $fromUser;
        $this->toUser = $toUser;
        $this->status = $status;
        $this->message = $message;
        $this->timestamp = $timestamp;
    }
}