<?php
require_once('classes/uploaded.class.php');
require_once('classes/tagging.class.php');
require_once('classes/user.class.php');
require_once('classes/equiptag.class.php');
require_once('data/uploaded.DAO.php');
require_once('data/tagging.DAO.php');
require_once('data/user.DAO.php');


class UserService
{
    public function isUsernameTaken($username)
    {
        $userDAO = new UserDAO();
        $userResults = $userDAO->getUploadedByAttributeValuesArray('username', array($username));
        $userArray = $this->createUserArray($userResults);
        $foundUser = array_pop($userArray);

        if ($foundUser) {
            return $foundUser;
        } else {
            return false;
        }
    }

    public function passwordsAreIdentical($password, $repeat)
    {
        if ($password != $repeat) {
            return false;
        } else {
            return true;
        }
    }

    public function checkUsernameAndPassword($username, $password)
    {
        $userDAO = new UserDAO();
        $userResults = $userDAO->getUserByUsernameAndPassword($username, $password);
        $userArray = $this->createUserArray($userResults);
        $foundUser = array_pop($userArray);
        if ($foundUser) {
            return $foundUser;
        } else {
            return false;
        }
    }

    public function registerNewUser($user)
    {
        $userDAO = new UserDAO();
        return $userDAO->createNewUser($user);
    }

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

    public function searchUploadedForText($text)
    {
        $uploadedDAO = new UploadedDAO();
        $uploadedResults = $uploadedDAO->searchUploadedForPartialText($text);
        $uploadedArray = $this->createUploadedArray($uploadedResults);
        return $uploadedArray;
    }

    public function isValidImage($fileArray)
    {
        $isValidImage = true;
        if ($fileArray['uploadedFile']['error'] !== UPLOAD_ERR_OK) {
            $isValidImage = false;
        }

        $info = getimagesize($fileArray['uploadedFile']['tmp_name']);
        if ($info === FALSE) {
            $isValidImage = false;
        }

        if (($info[2] !== IMAGETYPE_GIF) && ($info[2] !== IMAGETYPE_JPEG) && ($info[2] !== IMAGETYPE_PNG)) {
            $isValidImage = false;
        }

        return $isValidImage;
    }

    public function getAllTags()
    {
        $taggingDAO = new TaggingDAO();
        $equipTagResults = $taggingDAO->getAllTags();
        $equipTagArray = $this->createEquipTagArray($equipTagResults);
        return $equipTagArray;
    }

    public function categoriseEquipTag($equipTagArray)
    {
        $categorisedEquipTag = array();
        foreach ($equipTagArray as $equipTag) {
            if (!isset($categorisedEquipTag[$equipTag->tagCategory])) {
                $categorisedEquipTag[$equipTag->tagCategory] = array();
            }
            $categorisedEquipTag[$equipTag->tagCategory][] = $equipTag;
        }
        return $categorisedEquipTag;
    }


    private function createUploadedArray($uploadedResults)
    {
        $uploadedArray = array();
        $equipIDArray = array();
        foreach ($uploadedResults as $row) {
            $newUploaded = new Uploaded($row['id'], $row['name'], $row['imageURL'], $row['username'], $row['realPrice'], $row['mesoPrice'], $row['uploadTimestamp'], $row['status'], $row['statusTimestamp'], $row['description']);
            $uploadedArray[$row['id']] = $newUploaded;
            $equipIDArray[] = $row['id'];
        }
        $taggingDAO = new TaggingDAO();
        $taggingResults = $taggingDAO->getTaggingByAttributeValuesArray('equipID', $equipIDArray);
        return $this->createTaggingArray($taggingResults, $uploadedArray);
    }

    private function createUserArray($userResults)
    {
        $userArray = array();
        foreach ($userResults as $row) {
            $newUser = new User($row['username'], $row['password'], $row['email'], $row['referrer'], $row['referlink'], $row['role']);
            $userArray[$row['username']] = $newUser;
        }
        return $userArray;
    }

    private function createEquipTagArray($equipTagResults)
    {
        $equipTagArray = array();
        foreach ($equipTagResults as $row) {
            $newEquipTag = new EquipTag($row['id'], $row['value'], $row['tagCategory']);
            $equipTagArray[$row['id']] = $newEquipTag;
        }
        return $equipTagArray;
    }


    private function createTaggingArray($taggingResults, $uploadedArray = array())
    {
        foreach ($taggingResults as $row) {
            $newTagging = new Tagging($row['tagID'], $row['equipID']);
            $uploadedArray[$row['equipID']]->taggingArray[] = $newTagging;
        }
        return $uploadedArray;
    }
}