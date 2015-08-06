<?php
require_once("forAllPages.php");
require_once("services/user.service.php");
require_once("services/goods.service.php");

$userService = new UserService();
$goodsService = new GoodsService();
$goodsContainer = $goodsService->getAllGoods();
$userFound = false;
if (isset($_GET['username'])) {
    $browsedUser = $userService->getUserByUsername($_GET['username']);
    if ($browsedUser) {
        $userFound = true;
    } else {
        $userFound = false;
    }
}

if ($userFound) {
    include("views/profile.view.php");
} else {
    include("views/profilesearch.view.php");
}