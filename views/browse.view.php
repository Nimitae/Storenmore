<?php
//$uploadedContainer - Contains all Uploaded objects that are listed

shuffle($uploadedContainer);

include("partials/header.partial.php");
?>

<br><br>
<div class="col-sm-3">
<h2 class="filter-sidebar" style="font-size: 25px">FILTER BY</h2>

<div class="container-fluid filter-sidebar" style="background-color: white;">
    <div class="filter-header">
        <a href="#weap" data-toggle="collapse"><h3>Weapon</h3></a>
    </div>
    <div class="filter-body collapse in" id="weap">
        <div class="checkbox">
            <label draggable="true">
                <input type="checkbox" class="sh-active-element">Katana</label>
        </div>

        <div class="checkbox">
            <label draggable="true">
                <input type="checkbox" class="sh-active-element">Fan</label>
        </div>
    </div>
    <div class="filter-header">
        <a href="#armour" data-toggle="collapse"><h3>Armour</h3></a>
    </div>
    <div class="filter-body collapse in" id="armour">
        <div class="checkbox">
            <label draggable="true">
                <input type="checkbox" class="sh-active-element">Hat</label>
        </div>

        <div class="checkbox">
            <label draggable="true">
                <input type="checkbox" class="sh-active-element">Shoe</label>
        </div>

        <div class="checkbox">
            <label draggable="true">
                <input type="checkbox" class="sh-active-element">Glove</label>
        </div>

        <div class="checkbox">
            <label draggable="true">
                <input type="checkbox" class="sh-active-element">Cape</label>
        </div>

    </div>
    <div class="filter-header">
        <a href="#type" data-toggle="collapse"><h3>Type</h3></a>
    </div>
    <div class="filter-body collapse in" id="type">

        <div class="checkbox">
            <label draggable="true">
                <input type="checkbox" class="sh-active-element">Fafnir</label>
        </div>

        <div class="checkbox">
            <label draggable="true">
                <input type="checkbox" class="sh-active-element">Sengoku</label>
        </div>

        <div class="checkbox">
            <label draggable="true">
                <input type="checkbox" class="sh-active-element">Utgard</label>
        </div>

    </div>
    <div class="filter-header">
        <a href="#job" data-toggle="collapse"><h3> Job</h3></a>
    </div>
    <div class="filter-body collaps in" id="job">

        <div class="checkbox">
            <label draggable="true">
                <input type="checkbox" class="sh-active-element">Warrior</label>
        </div>

        <div class="checkbox">
            <label draggable="true">
                <input type="checkbox" class="sh-active-element">Magician</label>
        </div>

        <div class="checkbox">
            <label draggable="true">
                <input type="checkbox" class="sh-active-element">Bowman</label>
        </div>
        <div class="checkbox">
            <label draggable="true">
                <input type="checkbox" class="sh-active-element">Thief</label>
        </div>
        <div class="checkbox">
            <label draggable="true">
                <input type="checkbox" class="sh-active-element">Pirate</label>
        </div>

    </div>
</div>
</div>

<div class="col-sm-9" style="top: 25px">
    <div class="col-sm-12">
        <?php foreach($uploadedContainer as $uploaded) :?>
        <div class="col-sm-4 weapons nopadding-right">
            <div class="panel panel-default">
                <div class="panel-heading"><?php print $uploaded->name;?></div>
                <div class="panel-body"><img src="<?php print $uploaded->imageURL;?>" class="dynamic"></div>
                <div class="panel-body nopadding-top" style="text-align: left">Uploaded by: <?php print $uploaded->username;?></div>
                <?php if (!empty($uploaded->mesoPrice)) :?>
                <div class="panel-footer"> Mesos: <?php print $uploaded->mesoPrice;?></div>
                <?php endif;?>
                <?php if (!empty($uploaded->realPrice)) :?>
                    <div class="panel-footer"> Cash: <?php print $uploaded->realPrice;?></div>
                <?php endif;?>
            </div>
        </div>
        <?php endforeach; ?>

    </div>
</div>