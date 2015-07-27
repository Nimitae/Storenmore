<?php
require_once('config.php');


class LogDAO
{
    public function logPreparedStatement($action, $stmt, $binds, $result)
    {
        $dbh = new PDO(DBconfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $sql = "INSERT INTO logs VALUES (NULL, :action, :queryString, :binds, :result, NOW());";
        $binds = json_encode($binds);
        $queryString = $stmt->queryString;
        $statement = $dbh->prepare($sql);
        $statement->bindParam(':action', $action);
        $statement->bindParam(':queryString', $queryString);
        $statement->bindParam(':binds', $binds);
        $statement->bindParam(':result', $result);
        if ($statement->execute()) { //1 if success, 0 if fail
            return true;
        }
        var_dump($statement->errorInfo());
        $email = DBConfig::$DB_ADMIN_EMAIL;
        $subject = 'Database Logging Error';
        $message = '\n Following Query caused an error:
                    \n ' . $sql . '
                    \n PDO ErrorCode:
                    \n ' . $statement->errorCode();
        mail($email, $subject, $message);
        return false;
    }
}