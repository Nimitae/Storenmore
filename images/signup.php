<?php
require_once("forAllPages.php");


include("partials/header.partial.php");

?>

<!DOCTYPE html>
<html lang="en">

<body style="cursor: auto;">
<div class="container">
    <form class="form-signin" method="post" onsubmit="register();return false;" role="form">
        <h2 class="form-signin-heading">
            REGISTRATION
        </h2><input type="email" id="email" class="form-control" placeholder="Email address" required="" autofocus=""><input
            type="password" id="password" class="form-control" placeholder="Password" required=
        ""><input type="password" id="repeat" class="form-control outcast" placeholder="Re-enter password" required="">
        <button class="btn btn-lg btn-primary btn-block" type="submit">
            Sign up
        </button>
    </form>
</div>
<!-- /container -->
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</body>
</html>