<?php

class Announcement
{
    var $id;
    var $startDate;
    var $endDate;
    var $message;

    public function __construct($id, $startDate, $endDate, $message)
    {
        $this->id = $id;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->message = $message;
    }
}