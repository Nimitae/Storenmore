<?php
require_once('classes/good.class.php');
require_once('data/good.DAO.php');

class GoodsService
{
    public function getAllGoods()
    {
        $goodDAO = new GoodDAO();
        $goodResults = $goodDAO->getAllGoods();
        $goodArray = $this->createGoodArray($goodResults);
        return $goodArray;
    }

    private function createGoodArray($goodResults)
    {
        $goodArray = array();
        foreach ($goodResults as $row)
        {
            $newGood = new Good($row['id'], $row['name'], $row['imageURL'], $row['description']);
            $goodArray[$row['id']] = $newGood;
        }
        return $goodArray;
    }
}