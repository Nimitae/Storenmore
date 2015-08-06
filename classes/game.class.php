<?php

class Game
{
    var $id;
    var $gameName;

    var $serversContainers;

    public function __construct($id, $gameName)
    {
        $this->id = $id;
        $this->gameName = $gameName;
    }
}