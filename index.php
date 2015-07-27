<?php
require_once("forAllPages.php");


include("partials/header.partial.php");

?>
<br><br>


<div style="width: 80%; margin:auto">

    <h2>
        FOR SALE
    </h2>

    <div class="col-sm-12">
        <div class="col-sm-4">
            <div class="panel panel-default">
                <div class="panel-heading">Title of goods</div>
                <div class="panel-body"><img src="http://i57.tinypic.com/v5eux5.jpg"></div>
                <div class="panel-footer"> Price: ##</div>
            </div>
        </div>

        <div class="col-sm-5">
            <div class="panel panel-default">
                <div class="panel-heading">Title of goods</div>
                <div class="panel-body"><img src="http://i57.tinypic.com/v5eux5.jpg"> </div>
                <div class="panel-footer"> Price: ##</div>
            </div>
        </div>
    </div>

    <div style="height: 130px"></div>

    <h2>
        BUYER/SELLER LISTINGS
    </h2>

    <div class="col-sm-12">
        <div class="col-sm-3">
            <div class="panel panel-default">
                <div class="panel-heading">Title of goods</div>
                <div class="panel-body">Description of goods</div>
            </div>
        </div>

        <div class="col-sm-3">
            <div class="panel panel-default">
                <div class="panel-heading">Title of goods</div>
                <div class="panel-body">Description of goods</div>
            </div>
        </div>
    </div>

</div>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><span class="glyphicon glyphicon-lock"></span> Login</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" style="text-align: center">
                    <div class="form-group">
                        <div style="width: 200px; margin: auto">
                            <input class="form-control" type="text" id="inputEmail" placeholder="Email">
                        </div>
                    </div>
                    <div class="form-group">
                        <div>
                            <input class="form-control" type="password" id="inputPassword" placeholder="Password">
                        </div>
                    </div>
                    <div class="form-group">
                        <div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox">Remember me</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div>
                            <button type="submit" class="btn btn-default">Sign in</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>