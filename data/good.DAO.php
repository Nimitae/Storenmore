<?php
require_once('data/log.DAO.php');
require_once('config.php');

class GoodDAO
{
    public function getAllGoods()
    {
        $sql = "SELECT * FROM goods ORDER BY id ASC;";
        $dbh = new PDO(DBconfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $resultSet = $dbh->query($sql);
        $resultsArray = $resultSet->fetchAll(PDO::FETCH_ASSOC);
        return $resultsArray;
    }

    public function createGood($good)
    {
        /** @var Good $good */
        $sqlInsert = "INSERT INTO goods VALUES(NULL, :name, :imageURL, :description);";
        $dbh = new PDO(DBconfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare($sqlInsert);
        $stmt->bindParam(':name', $good->name);
        $stmt->bindParam(':imageURL', $good->imageURL);
        $stmt->bindParam(':description', $good->description);
        $binds = array(
            ":name" => $good->name,
            ":imageURL" => $good->imageURL,
            ":description" => $good->description,
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

    public function getGoodByAttributeValuesArray($attribute, $attributeValue)
    {
        $sqlParams = array();
        $sql = "SELECT * FROM goods
                       WHERE " . $attribute . " = ?";
        if (isset($attributeValue[0])) {
            $sqlParams[] = $attributeValue[0];

        if (count($attributeValue) > 1) {
            array_shift($attributeValue);
            foreach ($attributeValue as $value) {
                $sql .= "OR " . $attribute . " = ?";
                $sqlParams[] = $value;
            }
        }
        $sql .= " ORDER BY id ASC;";
        $dbh = new PDO(DBconfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare($sql);
        $stmt->execute($sqlParams);
        $resultsArray = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $resultsArray;
        } else {
            return array();
        }
    }
}
