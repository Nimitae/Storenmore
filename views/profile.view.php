<?php
//$browsedUser - User object found using $_GET['username']
//$goodsContainer - All goods


include("partials/header.partial.php");
?>
<br><br>
<div class="container-fluid" style="margin: 0 40px">

    <div class="col-sm-12">

        <div class="col-sm-4" style=" height: auto; padding: 0 !important;">

            <div style="background-color: white;">
                <div class="container-fluid inline-block" style="vertical-align:top;padding: 15px;">
                    <div class="borderedImg">
                        <img src="images/dragon7.png">
                    </div>
                </div>
                <div class="container-fluid inline-block" style="padding: 15px 0; height: auto">
                    <h4><?php print $browsedUser->username; ?></h4><br>
                    <?php foreach ($browsedUser->contactContainer[CONTACT_TYPE_EMAIL] as $contact) : ?>
                        Email: <?php print $contact->value; ?><br>
                    <?php endforeach; ?>
                    <?php foreach ($browsedUser->contactContainer[CONTACT_TYPE_PHONE] as $contact) : ?>
                        Phone: <?php print $contact->value; ?><br>
                    <?php endforeach; ?>
                    <?php foreach ($browsedUser->contactContainer[CONTACT_TYPE_IGN] as $contact) : ?>
                        IGN: <?php print $contact->value; ?><br>
                    <?php endforeach; ?>
                </div>
            </div>


            <div style="height: 10px"></div>
            <!--
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
            -->
            <?php if (sizeof($browsedUser->buyOrdersContainer) > 0) : ?>
                <div class="container-fluid" style="background-color:white; padding: 0; max-height: 400px;">
                    <div class="orders-table-label">BUYING</div>
                    <table class="table table-responsive orders-table">
                        <thead>
                        <tr>
                            <th></th>
                            <th>Item</th>
                            <th>Amount</th>
                            <th>Unit Price</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($browsedUser->buyOrdersContainer as $order) : ?>
                            <tr>
                                <td><a href="buysell.php?id=<?php print $order->goodsID;?>"><img src="<?php print $goodsContainer[$order->goodsID]->imageURL; ?>"></a></td>
                                <td><?php print $goodsContainer[$order->goodsID]->name; ?></td>
                                <td><?php print $order->quantity; ?></td>
                                <td><?php print $order->price . " " . $order->priceType; ?></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div style="height: 10px"></div>
            <?php endif; ?>
            <?php if (sizeof($browsedUser->sellOrdersContainer) > 0) : ?>
                <div class="container-fluid" style="background-color:white; padding: 0; max-height: 400px;">
                    <div class="orders-table-label">SELLING</div>
                    <table class="table table-responsive orders-table">
                        <thead>
                        <tr>
                            <th></th>
                            <th>Item</th>
                            <th>Amount</th>
                            <th>Unit Price</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($browsedUser->sellOrdersContainer as $order) : ?>
                            <tr>
                                <td><a href="buysell.php?id=<?php print $order->goodsID;?>"><img src="<?php print $goodsContainer[$order->goodsID]->imageURL; ?>"></a></td>
                                <td><?php print $goodsContainer[$order->goodsID]->name; ?></td>
                                <td><?php print $order->quantity; ?></td>
                                <td><?php print $order->price . " " . $order->priceType; ?></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div style="height: 10px"></div>
            <?php endif; ?>
        </div>


        <div class="col-sm-8">
            <?php foreach ($browsedUser->uploadedContainer as $uploaded) : ?>
                <div class="col-sm-6">
                    <?php include("views/uploadedpanel.view.php") ?>
                </div>
            <?php endforeach; ?>
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