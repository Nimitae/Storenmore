<?php

class UserDAO
{
    public function getUploadedByAttributeValuesArray($attribute, $attributeValue)
    {
        $sqlParams=array();
        $sql = "SELECT *
                        FROM users
                       WHERE " . $attribute . " = ?";
        $sqlParams[] = $attributeValue[0];
        if (count($attributeValue) > 1) {
            array_shift($attributeValue);
            foreach ($attributeValue as $value) {
                $sql .= "OR " . $attribute . " = ?";
                $sqlParams[] = $value;
            }
        }
        $sql .= ");";
        $dbh = new PDO(DBconfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare($sql);
        $stmt->execute($sqlParams);
        $resultsArray = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $resultsArray;
    }

    public function getUserByUsernameAndPassword($username, $password)
    {
        $sql = "SELECT * FROM users WHERE username =: username AND password =:password LIMIT 1;";
        $dbh = new PDO(DBconfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->execute();
        $resultsArray = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $resultsArray;
    }

    public function createNewUser($user)
    {
        /** @var User $user */
        $sqlInsert = "INSERT INTO users VALUES(:username, :password, :email, :referrer, :referlink, 1);";
        $dbh = new PDO(DBconfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare($sqlInsert);
        $stmt->bindParam(':username', $user->username);
        $stmt->bindParam(':password', $user->password);
        $stmt->bindParam(':email', $user->email);
        $stmt->bindParam(':referrer', $user->referrer);
        $stmt->bindParam(':referlink', $user->referlink);
        $binds = array(
            ":username" => $user->username,
            ":password" => $user->password,
            ":email" => $user->email,
            ":referrer" => $user->referrer,
            ":referlink" => $user->referlink
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