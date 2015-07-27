<?php

class Tagging
{
    var $tagID;
    var $equipID;


    public function __construct($tagID, $equipID)
    {
        $this->tagID = $tagID;
        $this->equipID = $equipID;
    }
}