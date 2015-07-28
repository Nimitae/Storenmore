<?php
require_once("forAllPages.php");

require_once('services/user.service.php');

$userService = new UserService();
$uploaded = $userService->searchUploadedForText('appe');
shuffle($uploaded);
var_dump($uploaded);