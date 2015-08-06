<?php


class Server
{
    var $id;
    var $gameID;
    var $serverName;

    public function __construct($id, $gameID, $serverName)
    {
        $this->id = $id;
        $this->gameID = $gameID;
        $this->serverName = $serverName;
    }
}