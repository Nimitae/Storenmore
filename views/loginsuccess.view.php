<?php

include("partials/header.partial.php");
?>
<h1> Successfully logged in!</h1>
<script type="text/javascript">
    window.onload = function() {
        setTimeout(function() {
            window.location = "index.php";
        }, 2000);
    };
</script>