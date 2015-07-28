<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="/bootstrap-3.3.5-dist/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/bootstrap-3.3.5-dist/css/bootstrap-theme.css">
    <link rel="stylesheet" type="text/css" href="/main.css">
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
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
<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container" style="width: 80%">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/index.php">thebackyard</a>
        </div>

        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li>
                    <a href="/browse.php">BROWSE</a>
                </li>
                <li>
                    <a href="/buysell.php">BUY/SELL</a>
                    <ul class="dropdown">
                        <li><a href="/buysell-te.php">Twisted Essences</a></li>
                        <li><a href="/buysell-hse.php">High Spell Essences</a></li>
                    </ul>
                </li>
                <li>
                    <form action="" class="navbar-form navbar-right">
                        <input type="text" class="form-control" placeholder="Search...">
                    </form>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">


                <?php if (!isset($_SESSION['username'])) : ?>
                    <li><a data-toggle="modal" href="#myModal" class="button"><span
                                class="glyphicon glyphicon-lock"></span>LOGIN
                        </a></li>

                <?php else : ?>
                    <li><a href="#upload" data-toggle="modal">UPLOAD</a></li>
                    <li><a href="logout.php">LOGOUT (<?php print $_SESSION['username'] ?>)</a></li>
                <?php endif; ?>

            </ul>


        </div>

    </div>


</div>
<div style="height:40px"></div>
<br>

<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content" style="width: 500px; margin: auto">
            <div class="modal-header bluebg">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" style="text-align: center"><span class="glyphicon glyphicon-lock"></span> LOGIN
                </h4>
            </div>
            <div class="modal-body">
                <form method="post" action="login.php" class="form-horizontal" style="text-align: center">
                    <div class="form-group">
                        <div style="width: 300px; margin: auto">
                            <input class="form-control" name="inputUsername" type="text" id="inputUsername"
                                   placeholder="Username">
                        </div>
                    </div>
                    <div class="form-group">
                        <div style="width: 300px; margin: auto">
                            <input class="form-control" name="inputPassword" type="password" id="inputPassword"
                                   placeholder="Password">
                        </div>
                    </div>
                    <div class="form-group">
                        <div>
                            <div class="checkbox" style="text-align: left; padding: 0 100px">
                                <label>
                                    <input type="checkbox">Remember me</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div>
                            <button type="submit" class="btn btn-default">Log In</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>

<div id="upload" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content" style="width: 500px; margin: auto">
            <div class="modal-header bluebg">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" style="text-align: center">Upload Picture of Equipment</h4>
            </div>

            <div class="modal-body">
                <form method="post" action="upload.php" enctype="multipart/form-data" class="form-horizontal"
                      style="text-align: center">
                    <div class="form-group">
                        <label for="uploadfile">Upload File</label>

                        <div style="width: 100%; padding-left: 150px">
                            <input type="file" id="uploadfile" name="uploadedFile">
                        </div>
                        <!--<p class="help-block"> abcdefgh </p>-->
                    </div>

                    <div class="form-group">
                        <div style="width: 300px; margin: auto" class="col-sm-offset-3">
                            <input class="form-control" type="text" id="inputTitle" name="itemName" placeholder="Title">
                        </div>
                    </div>
                    <div class="form-group">
                        <div style="width: 300px; margin: auto">
                            <div class="col-sm-12">
                                <input class="form-control" type="text" id="inputPrice" name="mesoPrice"
                                       placeholder="Price (Mesos)">
                            </div>

                        </div>
                    </div>

                    <div class="form-group">
                        <div style="width: 300px; margin: auto">
                            <div class="col-sm-8">
                                <input class="form-control" type="text" name="realPrice" id="inputPrice2"
                                       placeholder="Price (Real Money)">
                            </div>
                            <div class="form-group"><label for="select" class="control-label"></label>

                                <div class="col-sm-4"><select class="form-control" id="select" name="currency">
                                        <option value="SGD">SGD</option>
                                        <option value="RM">RM</option>
                                    </select></div>

                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div>
                            <button type="submit" class="btn btn-default">Upload</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>