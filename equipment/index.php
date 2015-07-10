<?php
require_once("../forAllPages.php");
require_once("../config.php");
require_once("../equipment.class.php");


$pdo = new PDO(DBconfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);

$sql = "SELECT * FROM equipment WHERE status = 1;";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$equipmentResults = $stmt->fetchAll(PDO::FETCH_ASSOC);
$equipmentList = array();
foreach ($equipmentResults as $row) {
    $newEquip = new Equipment($row['id'], $row['description'], $row['price'], $row['status'], $row['class'], $row['imageURL']);
    $equipmentList[$newEquip->id] = $newEquip;
}

$sql = "SELECT * FROM tagging;";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$taggingResults = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach ($taggingResults as $row) {
    if (isset($equipmentList[$row['equipID']])) {
        $equipmentList[$row['equipID']]->tags[$row['tagID']] = $row['tagID'];
    }
}


$sql = "SELECT * FROM equiptag;";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$tagResults = $stmt->fetchAll(PDO::FETCH_ASSOC);
$tagList = array();
foreach ($tagResults as $row) {
    $tagList[$row['id']] = $row['tag'];
}

include("../partials/header.partial.php");

?>

    <br><br>
    <div class="container col-sm-10 col-sm-offset-2">
        <?php foreach ($equipmentList as $equipment) : ?>
            <div class="panel col-sm-4 panel-default equipment-panel">
                <div class="panel-body">
                    <div class="equip-image">
                        <img src="<?php print $equipment->url ?>">
                    </div>
                    <div class="equip-text">
                        <p class="description">Description: <?php print $equipment->description ?></p>

                        <p class="price">
                            Price: <?php !empty($equipment->price)? print $equipment->price : print "Make us an offer" ?>
                        </p>
                    </div>

                    <div class="hashtags">
                        <hr>
                        <?php foreach ($equipment->tags as $tag) : ?>
                            <?php print '#' . $tagList[$tag] . '   '; ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

        <?php endforeach; ?>
    </div>
</body>