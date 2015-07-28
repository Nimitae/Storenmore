<?php

include("partials/header.partial.php");
?>
<h2>UPLOAD SUCCESSFUL. YOU CAN CHECK IT OUT ON BROWSE YO</h2>

<script type="text/javascript">
    window.onload = function() {
        setTimeout(function() {
            window.location = "browse.php";
        }, 2000);
    };
</script>