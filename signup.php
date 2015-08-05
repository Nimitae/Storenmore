<?php
require_once("forAllPages.php");
require_once("services/user.service.php");
$userService = new UserService();
$errorArray = array();
if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password'])&& isset($_POST['repeat'])&& isset($_POST['referral']))
{
    $registrationSuccessful = true;
    if ($userService->isUsernameTaken($_POST['username'])){
        $registrationSuccessful = false;
        $errorArray[] = "Username has been taken. Please try another username.";
    }

    if (!$userService->passwordsAreIdentical(md5($_POST['password']), md5($_POST['repeat']))) {
        $registrationSuccessful = false;
        $errorArray[] = "Your submitted passwords are not the same.";
    }
    
    if (!$userService->isUsernameTaken($_POST['referral'])){
        $registrationSuccessful = false;
        $errorArray[] = "Referrer does not exist. Perhaps you got their username wrong?";
    }

    if ($registrationSuccessful) {
        $newUser = new User($_POST['username'], md5($_POST['password']), $_POST['email'], $_POST['referral'], md5(time()), 1);
        $registrationSuccessful = $userService->registerNewUser($newUser);
        if (!$registrationSuccessful) {
            $errorArray[] = "Registration failed due to server issues.";
        }
    }
}

if (isset($registrationSuccessful) && $registrationSuccessful) {
    include('views/registrationsuccess.view.php');
} else  {
    include('views/registration.view.php');
}
