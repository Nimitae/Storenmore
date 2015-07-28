<?php

include("partials/header.partial.php");
?>
<br><br>
<?php if (isset($loginSuccess)) : ?>
<h2>Failed to login. Please try again!</h2>
<?php endif; ?>
<div class="container">
    Login here
    <form method="post">
        <input type="text" name="inputUsername" placeholder="Username">
        <input type="password" name="inputPassword" placeholder="Password">
        <input type="submit" class="btn">
    </form>
</div>