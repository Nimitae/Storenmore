<?php
require_once("forAllPages.php");
require_once("services/user.service.php");
$userService = new UserService();
if (isset($_SESSION['username'])){
    header('Location: index.php');
}



//include("partials/header.partial.php");


if (isset($_POST['inputUsername']) && isset($_POST['inputPassword'])) {
    if (!empty($_POST['inputUsername']) && !empty($_POST['inputPassword'])) {
        $loginSuccess = $userService->checkUsernameAndPassword($_POST['inputUsername'], md5($_POST['inputPassword']));
        if ($loginSuccess) {
            $_SESSION['username'] = $loginSuccess->username;
           include("views/loginsuccess.view.php");
        }
    }
}

if (!isset($loginSuccess) || !$loginSuccess) {
    include("views/loginfail.view.php");
}