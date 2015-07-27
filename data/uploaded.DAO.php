<?php
require_once('classes/uploaded.class.php');
require_once('data/log.DAO.php');
require_once('config.php');

class UploadedDAO
{
    public function getAllUploaded()
    {
        $sql = "SELECT * FROM uploaded ORDER BY statusTimestamp ASC;";
        $dbh = new PDO(DBconfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $resultSet = $dbh->query($sql);
        $resultsArray = $resultSet->fetchAll(PDO::FETCH_ASSOC);
        return $resultsArray;
    }

    public function getUploadedByAttributeValuesArray($attribute, $attributeValue)
    {
        $sql = "SELECT *
                        FROM uploaded
                       WHERE " . $attribute . " = '" . $attributeValue[0] . "'";
        if (count($attributeValue) > 1) {
            array_shift($attributeValue);
            foreach ($attributeValue as $value) {
                $sql .= "OR " . $attribute . " = '" . $value . "'";
            }
        }
        $sql .= "ORDER BY statusTimestamp ASC;";
        $dbh = new PDO(DBconfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $resultSet = $dbh->query($sql);
        $resultsArray = $resultSet->fetchAll(PDO::FETCH_ASSOC);
        return $resultsArray;
    }

    public function createUploaded($uploaded)
    {
        /** @var Uploaded $uploaded */
        $sqlInsert = "INSERT INTO uploaded VALUES(NULL, :name, :imageURL, :username, :realPrice, :mesoPrice, NULL, :status, :statusTimestamp, :description);";
        $dbh = new PDO(DBconfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare($sqlInsert);
        $stmt->bindParam(':name', $uploaded->name);
        $stmt->bindParam(':imageURL', $uploaded->imageURL);
        $stmt->bindParam(':username', $uploaded->username);
        $stmt->bindParam(':realPrice', $uploaded->realPrice);
        $stmt->bindParam(':mesoPrice', $uploaded->mesoPrice);
        $stmt->bindParam(':status', $uploaded->status);
        $stmt->bindParam(':statusTimestamp', $uploaded->statusTimestamp);
        $stmt->bindParam(':description', $uploaded->description);
        $binds = array(
            ":name" => $uploaded->name,
            ":imageURL" => $uploaded->imageURL,
            ":username" => $uploaded->username,
            ":realPrice" => $uploaded->realPrice,
            ":mesoPrice" => $uploaded->mesoPrice,
            ":status" => $uploaded->status,
            ":statusTimestamp" => $uploaded->statusTimestamp,
            ":description" => $uploaded->description,
        );
        $logDAO = new LogDAO();
        if ($stmt->execute()) {
            $logDAO->logPreparedStatement('INSERT', $stmt, $binds, 'SUCCESS');
            return true;
        } else {
            $logDAO->logPreparedStatement('INSERT', $stmt, $binds, 'FAILED');
            return false;
        }
    }

    public function updateUploaded($uploaded)
    {
        /** @var Uploaded $uploaded */
        $sqlInsert = "UPDATE uploaded SET name = :name,
                        imageURL = :imageURL,
                        username = :username,
                        priceType = :realPrice,
                        price = :mesoPrice,
                        status = :status,
                        statusTimestamp = :statusTimestamp,
                        description = :description WHERE
                        id = :id;";
        $dbh = new PDO(DBconfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare($sqlInsert);
        $stmt->bindParam(':name', $uploaded->name);
        $stmt->bindParam(':imageURL', $uploaded->imageURL);
        $stmt->bindParam(':username', $uploaded->username);
        $stmt->bindParam(':realPrice', $uploaded->realPrice);
        $stmt->bindParam(':mesoPrice', $uploaded->mesoPrice);
        $stmt->bindParam(':status', $uploaded->status);
        $stmt->bindParam(':statusTimestamp', $uploaded->statusTimestamp);
        $stmt->bindParam(':description', $uploaded->description);
        $stmt->bindParam(':id', $uploaded->id);
        $binds = array(
            ":name" => $uploaded->name,
            ":imageURL" => $uploaded->imageURL,
            ":username" => $uploaded->username,
            ":realPrice" => $uploaded->realPrice,
            ":mesoPrice" => $uploaded->mesoPrice,
            ":status" => $uploaded->status,
            ":statusTimestamp" => $uploaded->statusTimestamp,
            ":description" => $uploaded->description,
            ":id" => $uploaded->id
        );
        $logDAO = new LogDAO();
        if ($stmt->execute()) {
            $logDAO->logPreparedStatement('INSERT', $stmt, $binds, 'SUCCESS');
            return true;
        } else {
            $logDAO->logPreparedStatement('INSERT', $stmt, $binds, 'FAILED');
            return false;
        }
    }
}



