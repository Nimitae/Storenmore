<?php

class Personalisation
{
    var $username;
    var $avatarURL;
    var $biography;

    public function __construct($username, $avatarURL,$biography)
    {
        $this->biography = $biography;
        $this->avatarURL = $avatarURL;
        $this->username = $username;
    }
}