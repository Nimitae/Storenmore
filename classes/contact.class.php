<?php

class Contact
{
    var $id;
    var $username;
    var $contactType;
    var $value;
    var $value2;
    var $value3;

    public function __construct($id, $username, $contactType, $value, $value2 = null, $value3 = null)
    {
        $this->id = $id;
        $this->username = $username;
        $this->contactType = $contactType;
        $this->value = $value;
        $this->value2 = $value2;
        $this->value3 = $value3;
    }
}