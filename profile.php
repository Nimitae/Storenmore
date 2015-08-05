<?php
require_once("forAllPages.php");


include("partials/header.partial.php");

?>
<br><br>
<div class="container-fluid" style="margin: 0 40px">

    <div class="col-sm-12">

        <div class="col-sm-4" style="background-color: white; height: 180px; padding: 0 !important;">

            <div>
                <div class="container-fluid inline-block" style="padding: 15px;">
                    <div class="borderedImg">
                        <img src="images/dragon7.png">
                    </div>
                </div>
                <div class="container-fluid inline-block" style="padding: 15px 0; height: 180px">
                    <h4>123456789ABCD</h4>
                    World:<br>
                    IGN:<br>
                    Mobile:<br>
                    Email:<br>
                </div>
            </div>


            <div style="height: 10px"></div>

            <div class="container-fluid" style="background-color: white; padding: 15px">
                <div class="container">
                    <h4> 100% Positive</h4>
                     26 Votes
                </div>
                <div class="btn-group">
                    <button class="btn btn-default"><img src="http://cdn.flaticon.com/png/256/30048.png"
                                                         style="height: 28px"> 26
                    </button>
                    <button class="btn btn-default"><img src="http://cdn.flaticon.com/png/256/30197.png"
                                                         style="height: 28px"> 0
                    </button>
                </div>
            </div>
            <div style="height: 10px"></div>

            <div class="container-fluid" style="background-color:white; padding: 0; max-height: 200px;">
                <table class="table table-responsive scroll">
                    <thead>
                    <tr>
                        <th>Buy/Sell</th>
                        <th>Item</th>
                        <th>QTY</th>
                        <th>Unit Price</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Sell</td>
                        <td>miraculous chaos scroll of goodness</td>
                        <td>10000000</td>
                        <td>10m</td>
                    </tr>
                    <tr>
                        <td>Buy</td>
                        <td>twisted essence of time</td>
                        <td>100</td>
                        <td>10m</td>
                    </tr>
                    <tr>
                        <td>Sell</td>
                        <td>confusion fragment</td>
                        <td>100</td>
                        <td>10m</td>
                    </tr>
                    <tr>
                        <td>Sell</td>
                        <td>twisteds</td>
                        <td>100</td>
                        <td>10m</td>
                    </tr>
                    <tr>
                        <td>Buy</td>
                        <td>twisted essence of time</td>
                        <td>100</td>
                        <td>10m</td>
                    </tr>
                    <tr>
                        <td>Sell</td>
                        <td>confusion fragment</td>
                        <td>100</td>
                        <td>10m</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>


        <div class="col-sm-8">
            <div class="col-sm-6">
                <div class="panel panel-default">
                    <div class="panel-heading">Title of goods</div>
                    <div class="panel-body">Description of goods</div>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="panel panel-default">
                    <div class="panel-heading">Title of goods</div>
                    <div class="panel-body">Description of goods</div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>// Change the selector if needed
    var $table = $('table.scroll'),
        $bodyCells = $table.find('tbody tr:first').children(),
        colWidth;

    // Adjust the width of thead cells when window resizes
    $(window).resize(function () {
        // Get the tbody columns width array
        colWidth = $bodyCells.map(function () {
            return $(this).width();
        }).get();

        // Set the width of thead columns
        $table.find('thead tr').children().each(function (i, v) {
            $(v).width(colWidth[i]);
        });
    }).resize(); // Trigger resize handler</script>