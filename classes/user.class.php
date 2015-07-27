<?php

class User
{
    var $username;
    var $password;
    var $email;
    var $referrer;
    var $referlink;
    var $role;

    public function __construct($username, $password, $email, $referrer, $referlink, $role)
    {
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
        $this->referlink = $referlink;
        $this->referrer = $referrer;
        $this->role = $role;
    }
}