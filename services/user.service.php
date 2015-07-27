<?php
require_once('data/uploaded.DAO.php');


class UserService
{
    public function getUploadedByUsername($username)
    {
        $uploadedDAO = new UploadedDAO();
        $uploadedResults = $uploadedDAO->getUploadedByAttributeValuesArray('username', array($username));
        $uploadedArray = $this->createUploadedArray($uploadedResults);
        return $uploadedArray;
    }

    public function getAllUploaded()
    {
        $uploadedDAO = new UploadedDAO();
        $uploadedResults = $uploadedDAO->getAllUploaded();
        $uploadedArray = $this->createUploadedArray($uploadedResults);
        return $uploadedArray;
    }

    private function createUploadedArray($uploadedResults)
    {
        $uploadedArray = array();
        foreach ($uploadedResults as $row) {
            $newUploaded = new Uploaded($row['id'], $row['name'], $row['imageURL'], $row['username'], $row['realPrice'], $row['mesoPrice'], $row['uploadTimestamp'], $row['status'], $row['statusTimestamp'], $row['description']);
            $uploadedArray[] = $newUploaded;
        }
        return $uploadedArray;
    }
}