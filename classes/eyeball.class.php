<?php

class Eyeball
{
    var $id;
    var $eyeballType;
    var $value;
    var $username;

    public function __construct($id, $eyeballType, $value, $username)
    {
        $this->id = $id;
        $this->eyeballType = $eyeballType;
        $this->value = $value;
        $this->username = $username;
    }
}