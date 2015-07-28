<?php

class EquipTag
{
    var $id;
    var $value;
    var $tagCategory;

    public function __construct($id, $value, $tagCategory)
    {
        $this->id = $id;
        $this->value = $value;
        $this->tagCategory = $tagCategory;
    }
}