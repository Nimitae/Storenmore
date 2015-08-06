<?php

class User
{
    var $username;
    var $password;
    var $email;
    var $referrer;
    var $referlink;
    var $role;

    var $personalisation;
    var $uploadedContainer;
    var $buyOrdersContainer;
    var $sellOrdersContainer;
    var $contactContainer;

    public function __construct($username, $password, $email, $referrer, $referlink, $role)
    {
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
        $this->referlink = $referlink;
        $this->referrer = $referrer;
        $this->role = $role;
        $this->uploadedContainer = array();
        $this->buyOrdersContainer = array();
        $this->sellOrdersContainer = array();
        $this->contactContainer = array();
        $this->contactContainer[CONTACT_TYPE_EMAIL] = array();
        $this->contactContainer[CONTACT_TYPE_PHONE] = array();
        $this->contactContainer[CONTACT_TYPE_IGN] = array();
    }
}