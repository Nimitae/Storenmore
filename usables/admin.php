<?php
require_once("../forAllPages.php");
require_once("../config.php");
require_once("../usable.class.php");

if (!isset($_SESSION['username'])){
    header('Location: index.php');
}

$pdo = new PDO(DBconfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);

if (isset($_POST['newUsable'])) {
    $target_dir = "images/";
    $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
    $target_file = $target_dir . uniqid() . '.' . $ext;
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
    $sql = "INSERT INTO usable VALUES (NULL, :itemname, :stock, :price, :url, :description);";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":itemname", $_POST['name']);
    $stmt->bindParam(":url", $target_file);
    $stmt->bindParam(":stock", $_POST['stock']);
    $stmt->bindParam(":price", $_POST['price']);
    $stmt->bindParam(":description", $_POST['description']);
    if ($stmt->execute()) {
        print "Listing Ok<hr>";
    } else {
        print "Listing Failed<hr>";
    }
}

if (isset($_POST["editUsable"])) {
    $sql = "UPDATE usable SET stock = :stock, description = :description,price= :price WHERE id =:id;";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":id", $_POST['id']);
    $stmt->bindParam(":price", $_POST['price']);
    $stmt->bindParam(":stock", $_POST['stock']);
    $stmt->bindParam(":description", $_POST['description']);
    if ($stmt->execute()) {
        print "Edit Ok<hr>";
    } else {
        print "Edit Failed<hr>";
    }
}


$sql = "SELECT * FROM usable;";
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

<hr>
<form class="form-horizontal" action="admin.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="newUsable" value="1">
    <input type="text" name="name" placeholder="Item Name">
    <input type="text" name="price" placeholder="Price">
    <select name="stock">
        <option value="1">Unlisted</option>
        <option value="2">In Stock</option>
        <option value="3">No Stock</option>
    </select>
    <input type="text" name="description" placeholder="Description">
    <input style="display:inline-block" type="file" name="image" id="image">
    <input class="col-sm-offset-2" type="submit" value="List Usable Item" name="submit">
</form>
<hr>

<div class="container">
    <?php foreach ($usableList as $usable) : ?>
        <div class="col-sm-3 usable-panel">
            <form method="post">
                <input type="hidden" name="editUsable" value="1">
                <input type="hidden" name="id" value="<?php print $usable->id; ?>">
                <div class="panel panel-info">
                    <div class="panel-heading"><?php print $usable->name ?></div>
                    <div class="panel-body">
                        <div class="usable-image">
                            <img src="<?php print $usable->imageURL ?>">
                        </div>
                        <br>

                        <div class="usable-text">
                            <p class="price">
                                Price: <input type="text" name="price" value="<?php print $usable->price ?>">
                            </p>
                        </div>
                        <div class="usable-stock">
                            <p class="stock">
                                Stock:  <select name="stock">
                                    <option value="1" <?php $usable->stock == UNLISTED ? print "selected" : print ""; ?>>
                                        Unlisted
                                    </option>
                                    <option value="2" <?php $usable->stock == INSTOCK ? print "selected" : print ""; ?>>In Stock
                                    </option>
                                    <option value="3" <?php $usable->stock == NOSTOCK ? print "selected" : print ""; ?>>No Stock
                                    </option>
                                </select>
                            </p>
                        </div>
                        <div class="usable-text">
                            <p class="price">
                                Desc: <input type="text" name="description" value="<?php print $usable->description ?>">
                            </p>
                        </div>
                        <input type="submit" class="btn-xs btn btn-info" value="Save">
                    </div>
                </div>
            </form>
        </div>
    <?php endforeach; ?>
</div>
