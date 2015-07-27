<?php

class Contact
{
    var $id;
    var $username;
    var $contactType;
    var $value;

    public function __construct($id, $username, $contactType, $value)
    {
        $this->id = $id;
        $this->username = $username;
        $this->contactType = $contactType;
        $this->value = $value;
    }
}