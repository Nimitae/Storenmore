<?php
require_once("forAllPages.php");


include("partials/header.partial.php");

?>
<br><br>

<div class="container">
    <form class="form-signin" method="post" onsubmit="register();return false;" role="form">
        <h1 class="form-signin-heading" style="text-align: center; left: -20px">
            REGISTRATION
        </h1>
        <br>

        <div style="width: 300px; margin: auto">
            <div style="margin-bottom: 10px"><input type="text" id="email" class="form-control" placeholder="Username (Max 20 characters)" required="" autofocus=""></div>
            <div style="margin-bottom: 10px"><input type="email" id="email" class="form-control" placeholder="Email address" required="" autofocus=""></div>
            <div style="margin-bottom: 10px"><input type="password" id="password" class="form-control" placeholder="Password" required=""></div>
            <div style="margin-bottom: 10px"><input type="password" id="repeat" class="form-control outcast" placeholder="Re-enter password" required=""></div>
            <div style="margin-bottom: 10px"><input type="text" id="repeat" class="form-control outcast" placeholder="Referral code (if any)"></div>
        <button class="btn btn-danger btn-block" style="width: auto" type="submit">
            Sign up
        </button>
        </div>
    </form>
</div>
<!-- /container -->
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
