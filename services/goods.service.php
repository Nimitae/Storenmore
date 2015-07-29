<?php
require_once('classes/good.class.php');
require_once('classes/order.class.php');
require_once('data/good.DAO.php');
require_once('data/order.DAO.php');

class GoodsService
{
    public function getAllGoods()
    {
        $goodDAO = new GoodDAO();
        $goodResults = $goodDAO->getAllGoods();
        $goodArray = $this->createGoodArray($goodResults);
        return $goodArray;
    }

    public function getGoodByID($id)
    {
        $goodDAO = new GoodDAO();
        $goodResults = $goodDAO->getGoodByAttributeValuesArray('id', array($id));
        $goodArray = $this->createGoodArray($goodResults);
        $foundGood = array_pop($goodArray);
        if ($foundGood) {
            return $foundGood;
        } else {
            return false;
        }
    }

    public function saveOrder($order)
    {
        $orderDAO = new OrderDAO();
        return $orderDAO->createOrder($order);
    }


    private function createGoodArray($goodResults)
    {
        $orderDAO = new OrderDAO();
        $goodArray = array();
        $goodIDs = array();
        foreach ($goodResults as $row)
        {
            $newGood = new Good($row['id'], $row['name'], $row['imageURL'], $row['description']);
            $goodArray[$row['id']] = $newGood;
            $goodIDs = $row['id'];
        }
        $orderResults = $orderDAO->getOrderByAttributeValuesArray('goodsID', $goodIDs);
        foreach ($orderResults as $row) {
            $newOrder = new Order($row['id'],$row['goodsID'],$row['username'],$row['orderType'],$row['priceType'], $row['price'], $row['quantity'],$row['orderTimestamp'],$row['status'],$row['statusTimestamp']);
            if ($newOrder->orderType == BUY_ORDER_TYPE) {
                $goodArray[$row['goodsID']]->buyOrdersContainer[$row['id']] = $newOrder;
            } else if ($newOrder->orderType == SELL_ORDER_TYPE) {
                $goodArray[$row['goodsID']]->sellOrdersContainer[$row['id']] = $newOrder;
            }
        }
        return $goodArray;
    }

}