<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="/bootstrap-3.3.5-dist/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/bootstrap-3.3.5-dist/css/bootstrap-theme.css">
    <link rel="stylesheet" type="text/css" href="/main.css">
    <style>
        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        li {
            display: inline;
        }
    </style>

</head>
<body>
<div id='demo'></div>
<!-- Start Nav -->
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="/">StoreNMore</a>
        </div>
        <div>
            <ul class="nav navbar-nav">
                <li><a class="nav-text" href="/equipment">EQUIPMENT</a></li>
                <li><a class="nav-text" href="/usables">USABLES</a></li>
                <li><a class="nav-text" href="/sell">SELL TO US</a></li>
            </ul><ul class="pull-right nav navbar-nav">
            <?php if (isset($_SESSION['username'])) : ?>

                <li><a class="nav-text" href="/equipment/admin.php">EQUIPMENT(ADMIN)</a></li>
                <li><a class="nav-text" href="/crafting/admin.php">CRAFTING(ADMIN)</a></li>
                <li><a class="nav-text" href="/usables/admin.php">USABLES(ADMIN)</a></li>

            <?php endif; ?>
                <li><a class="nav-text" href="/chat">TALK TO US</a></li>
            </ul>
        </div>
    </div>
</nav>
<br>
