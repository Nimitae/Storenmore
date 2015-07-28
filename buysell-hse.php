<?php
require_once("forAllPages.php");


include("partials/header.partial.php");

?>
<br><br>
<h1>High Spell Essence</h1>
<div style="height: 40px"></div>
<div class="col-sm-12">
    <div class="col-sm-6">
        <h2>BUYERS</h2>
        <div class="filter-header">
            <a href="#buy" data-toggle="modal"><h3 style="text-align: center">Click to submit buy order</h3></a>
        </div>
        <div style="height: 2px"></div>
        <table class="table table-striped" style="background-color: white">
            <thead>
            <tr>
                <th>User</th>
                <th>Quantity</th>
                <th>Total Price</th>
                <th>Unit Price</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>1</td>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
            </tr>
            <tr>
                <td>3</td>
                <td>Larry</td>
                <td>the Bird</td>
                <td>@twitter</td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="col-sm-6">
        <h2>SELLERS</h2>
        <div class="filter-header">
            <a href="#sell" data-toggle="modal"><h3 style="text-align: center">Click to submit sell order</h3></a>
        </div>
        <div style="height: 2px"></div>
        <table class="table table-striped" style="background-color: white">
            <thead>
            <tr>
                <th>User</th>
                <th>Quantity</th>
                <th>Total Price</th>
                <th>Unit Price</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>1</td>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
            </tr>
            <tr>
                <td>3</td>
                <td>Larry</td>
                <td>the Bird</td>
                <td>@twitter</td>
            </tr>
            </tbody>
        </table>
    </div>
</div>

<!--Modals-->

<div id="buy" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content" style="width: 500px; margin: auto">
            <div class="modal-header bluebg">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" style="text-align: center"><img src="http://cdn.flaticon.com/svg/58/58063.svg" class="s-9"> BUY</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" style="text-align: center">
                    <div class="form-group">
                        <div style="width: 300px; margin: auto">
                            <input class="form-control" type="text" id="inputQuantity" placeholder="Quantity">
                        </div>
                    </div>
                    <div class="form-group">
                        <div style="width: 300px; margin: auto">
                            <input class="form-control" type="text" id="inputPrice" placeholder="Total Price">
                        </div>
                    </div>
                    <div class="form-group">
                        <div>
                            <button type="submit" class="btn btn-default">Submit Order</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>


<div id="sell" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content" style="width: 500px; margin: auto">
            <div class="modal-header bluebg">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" style="text-align: center"><img src="http://cdn.flaticon.com/png/256/66969.png" class="s-9">SELL</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" style="text-align: center">
                    <div class="form-group">
                        <div style="width: 300px; margin: auto">
                            <input class="form-control" type="text" id="inputQuantity" placeholder="Quantity">
                        </div>
                    </div>
                    <div class="form-group">
                        <div style="width: 300px; margin: auto">
                            <input class="form-control" type="text" id="inputPrice" placeholder="Total Price">
                        </div>
                    </div>
                    <div class="form-group">
                        <div>
                            <button type="submit" class="btn btn-default">Submit Order</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>