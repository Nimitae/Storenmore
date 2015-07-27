<?php

class EquipTag
{
    var $id;
    var $value;


    public function __construct($id, $value)
    {
        $this->id = $id;
        $this->value = $value;
    }
}