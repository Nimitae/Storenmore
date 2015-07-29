<?php
//$goodsContainer - Contains all goods available on system

include("partials/header.partial.php");
?>
<br><br>

<div class="container">
    <?php foreach ($goodsContainer as $good) :?>
        <a href="buysell.php?id=<?php print $good->id;?>">
            <div class="col-sm-2 sell-panel">
                <div class="panel panel-warning">
                    <div class="panel-heading"><?php print $good->name;?></div>
                    <div class="panel-body">
                        <div class="usable-image centeredImage">
                            <img src="<?php print $good->imageURL;?>">
                        </div>
                    </div>
                </div>
            </div>
        </a>
    <?php endforeach;?>
</div>