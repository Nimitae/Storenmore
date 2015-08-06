<?php
require_once("forAllPages.php");
require_once("services/user.service.php");
$userService = new UserService();

if (isset($_SESSION['username']) && isset($_POST['itemName']) && isset($_FILES)) {
    if ($userService->isValidImage($_FILES)){
        $target_dir = "uploads/";
        $ext = pathinfo($_FILES['uploadedFile']['name'], PATHINFO_EXTENSION);
        $target_file = $target_dir . uniqid(). $_FILES['uploadedFile']['name'];
        move_uploaded_file($_FILES["uploadedFile"]["tmp_name"], $target_file);
        $newUploaded = new Uploaded(NULL, $_POST['itemName'], $target_file, $_SESSION['username'], $_POST['realPrice'] . ' ' . $_POST['currency'], $_POST['mesoPrice'], NULL, 1, date('Y-m-d G:i:s', time()), 'tempdesc',);
        $uploadSuccess = $userService->saveNewUploaded($newUploaded);
    }
}


if (isset($uploadSuccess) && $uploadSuccess) {
    include('views/uploadsuccess.view.php');
} else {
    include('views/uploadfailed.view.php');
}

