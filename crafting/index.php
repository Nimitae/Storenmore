<?php
require_once("../forAllPages.php");
require_once("../config.php");
require_once("../crafting.class.php");

$pdo = new PDO(DBconfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);



$sql = "SELECT * FROM crafting WHERE stock <> 1;";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$craftingResults = $stmt->fetchAll(PDO::FETCH_ASSOC);
$craftingList = array();
foreach ($craftingResults as $row) {
    $newCrafting = new Crafting($row['id'], $row['name'], $row['stock'], $row['price'], $row['imageURL']);
    $craftingList[$newCrafting->id] = $newCrafting;
}


include("../partials/header.partial.php");
?>
<br><br>
<div class="container">
<?php foreach ($craftingList as $crafting) : ?>
    <div class="col-sm-2 crafting-panel">
        <div class="panel panel-info" style="height: 200px;">
            <div class="panel-heading"><?php print $crafting->name ?></div>
            <div class="panel-body">
                <div class="crafting-image">
                    <img src="<?php print $crafting->imageURL ?>">
                </div>
                <br>
                <div class="crafting-text">
                    <p class="price">
                        Price: <?php !empty($crafting->price) ? print $crafting->price : print "Not listed" ?>
                    </p>
                </div>
                <div class="crafting-stock">
                    <p class="stock">
                        <?php if ($crafting->stock == INSTOCK) print "In stock"; else print "No stock"; ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
</div>