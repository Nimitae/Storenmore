<?php
require_once("../forAllPages.php");
require_once("../config.php");
require_once("../crafting.class.php");

if (!isset($_SESSION['username'])){
    header('Location: index.php');
}

$pdo = new PDO(DBconfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);

if (isset($_POST['newCrafting'])) {
    $target_dir = "images/";
    $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
    $target_file = $target_dir . uniqid() . '.' . $ext;
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
    $sql = "INSERT INTO crafting VALUES (NULL, :itemname, :stock, :price, :url);";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":itemname", $_POST['name']);
    $stmt->bindParam(":url", $target_file);
    $stmt->bindParam(":stock", $_POST['stock']);
    $stmt->bindParam(":price", $_POST['price']);
    if ($stmt->execute()) {
        print "Listing Ok<hr>";
    } else {
        print "Listing Failed<hr>";
    }
}

if (isset($_POST["editCrafting"])) {
    $sql = "UPDATE crafting SET stock = :stock, price= :price WHERE id =:id;";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":id", $_POST['id']);
    $stmt->bindParam(":price", $_POST['price']);
    $stmt->bindParam(":stock", $_POST['stock']);
    if ($stmt->execute()) {
        print "Edit Ok<hr>";
    } else {
        print "Edit Failed<hr>";
    }
}


$sql = "SELECT * FROM crafting;";
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

<hr>
<form class="form-horizontal" action="admin.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="newCrafting" value="1">
    <input type="text" name="name" placeholder="Item Name">
    <input type="text" name="price" placeholder="Price">
    <select name="stock">
        <option value="1">Unlisted</option>
        <option value="2">In Stock</option>
        <option value="3">No Stock</option>
    </select>
    <input style="display:inline-block" type="file" name="image" id="image">
    <input class="col-sm-offset-2" type="submit" value="List Crafting Item" name="submit">
</form>
<hr>

<div class="container">
    <?php foreach ($craftingList as $crafting) : ?>
        <div class="col-sm-3 crafting-panel">
            <form method="post">
                <input type="hidden" name="editCrafting" value="1">
                <input type="hidden" name="id" value="<?php print $crafting->id; ?>">
                <div class="panel panel-info">
                    <div class="panel-heading"><?php print $crafting->name ?></div>
                    <div class="panel-body">
                        <div class="crafting-image">
                            <img src="<?php print $crafting->imageURL ?>">
                        </div>
                        <br>

                        <div class="crafting-text">
                            <p class="price">
                                Price: <input type="text" name="price" value="<?php print $crafting->price ?>">
                            </p>
                        </div>
                        <div class="crafting-stock">
                            <p class="stock">
                                Stock:  <select name="stock">
                                    <option value="1" <?php $crafting->stock == UNLISTED ? print "selected" : print ""; ?>>
                                        Unlisted
                                    </option>
                                    <option value="2" <?php $crafting->stock == INSTOCK ? print "selected" : print ""; ?>>In Stock
                                    </option>
                                    <option value="3" <?php $crafting->stock == NOSTOCK ? print "selected" : print ""; ?>>No Stock
                                    </option>
                                </select>
                            </p>
                        </div>
                        <input type="submit" class="btn-xs btn btn-info" value="Save">
                    </div>
                </div>
            </form>
        </div>
    <?php endforeach; ?>
</div>
