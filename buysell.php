<?php
require_once("forAllPages.php");
require_once("services/goods.service.php");

$goodsService = new GoodsService();
$goodsContainer = $goodsService->getAllGoods();
$goodsFound = false;




if (isset($_GET['id']) && isset($goodsContainer[$_GET['id']])) {
    $goodsFound = true;
    if (isset($_POST['buyOrder'])) {
        $newOrder = new Order(NULL, $_GET['id'], $_SESSION['username'], BUY_ORDER_TYPE, $_POST['priceType'], $_POST['price'], $_POST['quantity'], NULL, 1, date('Y-m-d G:i:s', time()), );
        $orderPlacedSuccessfully = $goodsService->saveOrder($newOrder);
    }

    if (isset($_POST['sellOrder'])){
        $newOrder = new Order(NULL, $_GET['id'], $_SESSION['username'], SELL_ORDER_TYPE, $_POST['priceType'], $_POST['price'], $_POST['quantity'], NULL, 1, date('Y-m-d G:i:s', time()), );
        $orderPlacedSuccessfully = $goodsService->saveOrder($newOrder);
    }
    $currentGoods = $goodsService->getGoodByID($_GET['id']);
}


if ($goodsFound) {
    include('views/buysellitem.view.php');
} else {
    include('views/buyselllisting.view.php');
}
