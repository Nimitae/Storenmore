<?php
require_once("forAllPages.php");

require_once('services/user.service.php');
require_once('services/goods.service.php');

$userService = new UserService();
$goodsService= new GoodsService();
var_dump($goodsService->getAllGoods());