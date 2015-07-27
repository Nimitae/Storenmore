<?php
require_once('services/user.service.php');

$userService = new UserService();
var_dump($userService->getAllUploaded());