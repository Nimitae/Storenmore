<?php
// $errorArray - Contains errors from attempt to register
// $registrationSuccessful - If set but here means registration failed. If not set, means no attempt to register.

include("partials/header.partial.php");
?>
<br><br>

<div class="container">
    <form class="form-signin" method="post" role="form">
        <h1 class="form-signin-heading" style="text-align: center; left: -20px">
            REGISTRATION
        </h1>
        <br>

        <div style="width: 300px; margin: auto">
            <div style="margin-bottom: 10px"><input type="text" id="username" name="username" class="form-control" placeholder="Username (Max 12 characters)" maxlength="12" required="" autofocus=""></div>
            <div style="margin-bottom: 10px"><input type="email" id="email" name="email" class="form-control" placeholder="Email address" required="" autofocus=""></div>
            <div style="margin-bottom: 10px"><input type="password" id="password" name="password" class="form-control" placeholder="Password" required=""></div>
            <div style="margin-bottom: 10px"><input type="password" id="repeat" name="repeat" class="form-control outcast" placeholder="Re-enter password" required=""></div>
            <div style="margin-bottom: 10px"><input type="text" id="repeat" name="referral" class="form-control outcast" maxlength="12" placeholder="Referrer username (if any)"></div>
            <button class="btn btn-danger btn-block" style="width: auto" type="submit">
                Sign up
            </button>
        </div>
    </form>

        <?php foreach ($errorArray as $errorMessage) :?>
            <h2><?php print $errorMessage;?></h2>
        <?php endforeach; ?>

</div>
