<?php
require_once("forAllPages.php");
if (isset($_POST['username']) && isset($_POST['password'])) {
    if ($_POST['username'] == "admin" && $_POST['password'] == "1qazxsw23edc"){
        $_SESSION['username'] = "admin";
    }
}


include("partials/header.partial.php");

?>
<br><br>
<div class="container">
    Login here
    <form method="post">
        <input type="text" name="username" placeholder="Username">
        <input type="password" name="password" placeholder="Password">
        <input type="submit" class="btn">
    </form>
    <?php if (isset($_SESSION['username'])) : ?>
        <h2>Successfully logged in.</h2>

    <?php endif; ?>

</div>