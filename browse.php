<?php
require_once("forAllPages.php");
require_once("services/user.service.php");
$userService = new UserService();

$uploadedContainer = $userService->getAllUploaded();
$equipTagArray = $userService->getAllTags();
$categorisedEquipTag = $userService->categoriseEquipTag($equipTagArray);

include("views/browse.view.php");

