<?php
require_once('data/log.DAO.php');
require_once('config.php');

class TaggingDAO
{
    public function getTaggingByAttributeValuesArray($attribute, $attributeValue)
    {
        $sql = "SELECT *
                        FROM tagging
                       WHERE " . $attribute . " = '" . $attributeValue[0] . "'";
        if (count($attributeValue) > 1) {
            array_shift($attributeValue);
            foreach ($attributeValue as $value) {
                $sql .= "OR " . $attribute . " = '" . $value . "'";
            }
        }
        $sql .= " ORDER BY equipID ASC;";
        $dbh = new PDO(DBconfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $resultSet = $dbh->query($sql);
        $resultsArray = $resultSet->fetchAll(PDO::FETCH_ASSOC);
        return $resultsArray;
    }
}