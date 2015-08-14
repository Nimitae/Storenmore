<?php
require_once("forAllPages.php");
require_once("services/user.service.php");
$userService = new UserService();


if (isset($_POST['search'])) {
    $uploadedContainer = $userService->searchUploadedForText($_POST['search']);
} else {
    $uploadedContainer = $userService->getAllUploaded();
}
$equipTagArray = $userService->getAllTags();
$categorisedEquipTag = $userService->categoriseEquipTag($equipTagArray);

include("views/browse.view.php");

