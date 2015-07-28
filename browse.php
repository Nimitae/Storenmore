<?php
require_once("forAllPages.php");
require_once("services/user.service.php");
$userService = new UserService();

$uploadedContainer = $userService->getAllUploaded();

include("views/browser.view.php");

