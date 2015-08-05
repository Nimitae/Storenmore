<?php
require_once('data/log.DAO.php');
require_once('config.php');

class TaggingDAO
{
    public function getTaggingByAttributeValuesArray($attribute, $attributeValue)
    {
        $sqlParams = array();
        $sql = "SELECT * FROM tagging
                       WHERE " . $attribute . " = ?";
        $sqlParams[] = $attributeValue[0];
        if (count($attributeValue) > 1) {
            array_shift($attributeValue);
            foreach ($attributeValue as $value) {
                $sql .= "OR " . $attribute . " = ?";
                $sqlParams[] = $value;
            }
        }
        $sql .= " ORDER BY equipID ASC;";
        $dbh = new PDO(DBconfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare($sql);
        $stmt->execute($sqlParams);
        $resultsArray = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $resultsArray;
    }

    public function getAllTags()
    {
        $sql = "SELECT * FROM equiptags ORDER BY id ASC;";
        $dbh = new PDO(DBconfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $resultSet = $dbh->query($sql);
        $resultsArray = $resultSet->fetchAll(PDO::FETCH_ASSOC);
        return $resultsArray;
    }
}