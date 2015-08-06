<?php

class Uploaded
{
    var $id;
    var $name;
    var $imageURL;
    var $username;
    var $realPrice;
    var $mesoPrice;
    var $uploadTimestamp;
    var $status;
    var $statusTimestamp;
    var $description;
    var $serverID;

    var $taggingArray;


    public function __construct($id, $name, $imageURL, $username, $realPrice, $mesoPrice, $uploadTimestamp, $status, $statusTimestamp, $description, $serverID)
    {
        $this->id = $id;
        $this->name = $name;
        $this->imageURL = $imageURL;
        $this->username = $username;
        $this->realPrice = $realPrice;
        $this->mesoPrice = $mesoPrice;
        $this->uploadTimestamp = $uploadTimestamp;
        $this->description = $description;
        $this->status = $status;
        $this->statusTimestamp = $statusTimestamp;
        $this->taggingArray = array();
        $this->serverID = $serverID;
    }

    public function isValidUploaded($isNew)
    {
        $errorArray = array();
        if ($isNew && $this->id != NULL) {
            $errorArray[] = 'id is invalid';
        } else if (!$isNew && is_nan($this->id)){
            $errorArray[] = 'id is invalid';
        }

        if (is_null($this->name)) {
            $errorArray[] = 'name is invalid';
        }

        if (is_null($this->imageURL)) {
            $errorArray[] = 'imageURL is invalid';
        }

        if (is_null($this->username)) {
            $errorArray[] = 'username is invalid';
        }

        if (is_nan($this->status)) {
            $errorArray[] = 'status is invalid';
        }
    }
}