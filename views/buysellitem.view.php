<?php
// $currentGoods - Current single Good object being looked up

include("partials/header.partial.php");

?>
<br><br>

<div style="margin: 0 40px">
    <h1 style="margin-left: 30px"><?php print $currentGoods->name; ?></h1>

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
                <?php foreach ($currentGoods->buyOrdersContainer as $buyOrder) : ?>
                    <tr>
                        <td><?php print $buyOrder->username; ?></td>
                        <td><?php print $buyOrder->quantity; ?></td>
                        <td><?php print $buyOrder->price * $buyOrder->quantity . ' ' . $buyOrder->priceType; ?></td>
                        <td><?php print $buyOrder->price . ' ' . $buyOrder->priceType; ?></td>
                    </tr>
                <?php endforeach; ?>
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
                <?php foreach ($currentGoods->sellOrdersContainer as $sellOrder) : ?>
                    <tr>
                        <td><?php print $sellOrder->username; ?></td>
                        <td><?php print $sellOrder->quantity; ?></td>
                        <td><?php print $sellOrder->price * $sellOrder->quantity . ' ' . $sellOrder->priceType; ?></td>
                        <td><?php print $sellOrder->price . ' ' . $sellOrder->priceType; ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!--Modals-->

<div id="buy" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <?php if (isset($_SESSION['username'])) : ?>
            <!-- Modal content-->
            <div class="modal-content" style="width: 500px; margin: auto">
                <div class="modal-header bluebg">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" style="text-align: center"><img
                            src="http://cdn.flaticon.com/svg/58/58063.svg"
                            class="s-9"> BUY</h4>
                </div>
                <div class="modal-body">
                    <form method="post" class="form-horizontal" style="text-align: center">
                        <input type="hidden" name="buyOrder" value="buyOrder">

                        <div class="form-group">
                            <div style="width: 300px; margin: auto">
                                <input class="form-control" name="quantity" type="number" min="0" id="inputQuantity"
                                       placeholder="Quantity">
                            </div>
                        </div>
                        <div class="form-group">
                            <div style="width: 300px; margin: auto">
                                <div class="col-sm-7">
                                    <input class="form-control" type="number" min="0" name="price" id="inputPrice2"
                                           placeholder="Price">
                                </div>
                                <div class="form-group"><label for="select" class="control-label"></label>

                                    <div class="col-sm-5"><select class="form-control" id="select" name="priceType">
                                            <option value="Mesos">Mesos</option>
                                            <option value="SGD">SGD</option>
                                            <option value="RM">RM</option>
                                        </select>
                                    </div>
                                </div>
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
        <?php else : ?>
            <?php include('views/login.modal.view.php');?>
        <?php endif; ?>
    </div>
</div>


<div id="sell" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <?php if (isset($_SESSION['username'])) : ?>
            <!-- Modal content-->
            <div class="modal-content" style="width: 500px; margin: auto">
                <div class="modal-header bluebg">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" style="text-align: center"><img
                            src="http://cdn.flaticon.com/png/256/66969.png"
                            class="s-9">SELL</h4>
                </div>
                <div class="modal-body">
                    <form method="post" class="form-horizontal" style="text-align: center">
                        <input type="hidden" name="sellOrder" value="sellOrder">

                        <div class="form-group">
                            <div style="width: 300px; margin: auto">
                                <input class="form-control" name="quantity" type="number" min="0" id="inputQuantity"
                                       placeholder="Quantity">
                            </div>
                        </div>
                        <div class="form-group">
                            <div style="width: 300px; margin: auto">
                                <div class="col-sm-7">
                                    <input class="form-control" type="number" min="0" name="price" id="inputPrice2"
                                           placeholder="Price">
                                </div>
                                <div class="form-group"><label for="select" class="control-label"></label>

                                    <div class="col-sm-5"><select class="form-control" id="select" name="priceType">
                                            <option value="Mesos">Mesos</option>
                                            <option value="SGD">SGD</option>
                                            <option value="RM">RM</option>
                                        </select></div>

                                </div>
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

        <?php else : ?>
            <?php include('views/login.modal.view.php');?>
        <?php endif; ?>
    </div>
</div>