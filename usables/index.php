<?php
require_once("../forAllPages.php");
require_once("../config.php");
require_once("../usable.class.php");

$pdo = new PDO(DBconfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);



$sql = "SELECT * FROM usable WHERE stock <> 1;";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$usableResults = $stmt->fetchAll(PDO::FETCH_ASSOC);
$usableList = array();
foreach ($usableResults as $row) {
    $newUsable = new Usable($row['id'], $row['name'], $row['stock'], $row['price'], $row['imageURL'], $row['description']);
    $usableList[$newUsable->id] = $newUsable;
}


include("../partials/header.partial.php");
?>
<br><br>
<div class="container">
<?php foreach ($usableList as $usable) : ?>
    <div class="col-sm-2 usable-panel">
        <div class="panel panel-info">
            <div class="panel-heading"><?php print $usable->name ?></div>
            <div class="panel-body">
                <div class="usable-image">
                    <img src="<?php print $usable->imageURL ?>">
                </div>
                <br>
                <div class="usable-text">
                    <p class="price">
                        Price: <?php !empty($usable->price) ? print $usable->price : print "Not listed" ?>
                    </p>
                </div>
                <div class="usable-text">
                    <p class="price">
                        Desc: <?php print $usable->description ?>
                    </p>
                </div>

                <div class="usable-stock">
                    <p class="stock">
                        <?php if ($usable->stock == INSTOCK) print "In stock"; else print "No stock"; ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
</div>