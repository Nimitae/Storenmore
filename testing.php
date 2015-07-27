<?php
require_once("forAllPages.php");

require_once('services/user.service.php');

$userService = new UserService();
$uploaded = $userService->getUploadedByUsername('nimitae')[0];
$userService->deleteUploaded($uploaded);