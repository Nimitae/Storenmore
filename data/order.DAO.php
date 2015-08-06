<?php
require_once('data/log.DAO.php');
require_once('config.php');


class OrderDAO
{
    public function getOrderByAttributeValuesArray($attribute, $attributeValue)
    {
        $sqlParams = array();
        $sql = "SELECT * FROM orders
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
            $sql .= " ORDER BY goodsID ASC;";
            $dbh = new PDO(DBconfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
            $stmt = $dbh->prepare($sql);
            $stmt->execute($sqlParams);
            $resultsArray = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $resultsArray;
        } else {
            return array();
        }
    }

    public function createOrder($order)
    {
        /** @var Order $order */
        $sqlInsert = "INSERT INTO orders VALUES(NULL, :goodsID, :username, :orderType, :priceType, :price, :quantity, NULL, :status, :statusTimestamp, :serverID);";
        $dbh = new PDO(DBconfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare($sqlInsert);
        $stmt->bindParam(':goodsID', $order->goodsID);
        $stmt->bindParam(':username', $order->username);
        $stmt->bindParam(':orderType', $order->orderType);
        $stmt->bindParam(':priceType', $order->priceType);
        $stmt->bindParam(':price', $order->price);
        $stmt->bindParam(':quantity', $order->quantity);
        $stmt->bindParam(':status', $order->status);
        $stmt->bindParam(':statusTimestamp', $order->statusTimestamp);
        $stmt->bindParam(':serverID', $order->serverID);
        $binds = array(
            ":goodsID" => $order->goodsID,
            ":username" => $order->username,
            ":orderType" => $order->orderType,
            ":priceType" => $order->priceType,
            ":price" => $order->price,
            ":quantity" => $order->quantity,
            ":status" => $order->status,
            ":statusTimestamp" => $order->statusTimestamp,
            ":serverID" => $order->serverID
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

    public function updateOrder($order)
    {
        /** @var Order $order */
        $sqlInsert = "UPDATE orders SET goodsID = :goodsID,
                        username = :username,
                        orderType = :orderType,
                        priceType = :priceType,
                        price = :price,
                        quantity = :quantity,
                        status = :status,
                        statusTimestamp = :statusTimestamp WHERE
                        id = :id;";
        $dbh = new PDO(DBconfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare($sqlInsert);
        $stmt->bindParam(':goodsID', $order->goodsID);
        $stmt->bindParam(':username', $order->username);
        $stmt->bindParam(':orderType', $order->orderType);
        $stmt->bindParam(':priceType', $order->priceType);
        $stmt->bindParam(':price', $order->price);
        $stmt->bindParam(':quantity', $order->quantity);
        $stmt->bindParam(':status', $order->status);
        $stmt->bindParam(':statusTimestamp', $order->statusTimestamp);
        $stmt->bindParam(':id', $order->id);
        $stmt->bindParam(':serverID', $order->serverID);
        $binds = array(
            ":goodsID" => $order->goodsID,
            ":username" => $order->username,
            ":orderType" => $order->orderType,
            ":priceType" => $order->priceType,
            ":price" => $order->price,
            ":quantity" => $order->quantity,
            ":status" => $order->status,
            ":statusTimestamp" => $order->statusTimestamp,
            ":id" => $order->id,
            ":serverID" => $order->serverID
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