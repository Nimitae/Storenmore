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

    public function countListedUploadedByUsername($username)
    {
        $uploadedByUsername = $this->getUploadedByUsername($username);
        $count = 0;
        foreach ($uploadedByUsername as $uploaded) {
            if ($uploaded->status == UPLOADED_LISTED) {
                $count++;
            }
        }
        return $count;
    }

    public function deleteUploaded($uploaded)
    {
        $uploaded->status = UPLOADED_DELETED;
        $uploadedDAO = new UploadedDAO();
        return $uploadedDAO->updateUploaded($uploaded);
    }

    public function saveNewUploaded($uploaded)
    {
        $uploadedDAO = new UploadedDAO();
        return $uploadedDAO->createUploaded($uploaded);
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