<?php
require_once("../forAllPages.php");
require_once("../config.php");
require_once("../equipment.class.php");

if (!isset($_SESSION['username'])){
    header('Location: index.php');
}

$pdo = new PDO(DBconfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
if (isset($_POST['newEquipment'])) {
    $target_dir = "images/";
    $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
    $target_file = $target_dir . uniqid() . '.' . $ext;
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
    $sql = "INSERT INTO equipment VALUES (NULL, :description, :url, :class, :price, 1);";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":description", $_POST['description']);
    $stmt->bindParam(":url", $target_file);
    $stmt->bindParam(":class", $_POST['class']);
    $stmt->bindParam(":price", $_POST['price']);
    if ($stmt->execute()) {
        print "Listing Ok<hr>";
    } else {
        print "Listing Failed<hr>";
    }
}

if (isset($_POST["editEquipment"])) {
    $sql = "UPDATE equipment SET description = :description, price= :price, status = :status WHERE id =:id;";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":description", $_POST['description']);
    $stmt->bindParam(":id", $_POST['id']);
    $stmt->bindParam(":status", $_POST['status']);
    $stmt->bindParam(":price", $_POST['price']);
    if ($stmt->execute()) {
        print "Edit Ok<hr>";
    } else {
        print "Edit Failed<hr>";
    }
}

if (isset($_POST["editEquipHashtag"])) {
    $submittedHashtagArray = array();
    foreach ($_POST as $key => $value) {
        if ($key == "editEquipHashtag" || $key == "id") {
            continue;
        } else {
            $submittedHashtagArray[explode('_', $key)[1]] = explode('_', $key)[1];
        }
    }
    $sql = "SELECT * FROM tagging WHERE equipID = :equipID;";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":equipID", $_POST['id']);
    if ($stmt->execute()) {
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $row) {
            if (isset($submittedHashtagArray[$row['tagID']])) {
                unset($submittedHashtagArray[$row['tagID']]);
            } else {
                $sql = "DELETE FROM tagging WHERE tagID = " . $row['tagID'] . " AND equipID = " . $_POST['id'] . ";";
                $stmt = $pdo->prepare($sql);
                $stmt->execute();
            }
        }
        foreach ($submittedHashtagArray as $tagID) {
            $sql = "INSERT INTO tagging VALUES(" . $tagID . ", " . $_POST['id'] . ");";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
        }
        print "Edit Ok<hr>";
    } else {
        print "Edit Failed<hr>";
    }
}

$sql = "SELECT * FROM equipment;";
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
    $equipmentList[$row['equipID']]->tags[$row['tagID']] = $row['tagID'];
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
    <hr>
    <form class="form-horizontal" action="admin.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="newEquipment" value="1">
        <input type="text" name="description" placeholder="Description">
        <input type="text" name="price" placeholder="Price">
        <select name="class">
            <option value="1">All</option>
            <option value="2">Warrior</option>
            <option value="3">Thief</option>
            <option value="4">Magician</option>
            <option value="5">Pirate</option>
            <option value="6">Bowman</option>
        </select>
        <input style="display:inline-block" type="file" name="image" id="image">
        <input class="col-sm-offset-2" type="submit" value="List Equip" name="submit">
    </form>
    <hr>
<?php

foreach ($equipmentList as $equipment) : ?>
    <div class="container">
        <div class="col-sm-4">
            <img class="equip-image" src="<?php print $equipment->url ?>">
        </div>
        <div class="col-sm-8">
            <form action="admin.php" method="post">
                <div class="">

                    <input type="hidden" name="editEquipment" value="1">
                    <input type="hidden" name="id" value="<?php print $equipment->id ?>">

                    <p class="id">ID: <input type="text" name="id" value="<?php print $equipment->id ?>" disabled></p>

                    <p class="description">Description: <input type="text" name="description"
                                                               value="<?php print $equipment->description ?>"></p>

                    <p class="price">Price: <input type="text" name="price" value="<?php print $equipment->price ?>">
                    </p>

                    <p class="price">Status:
                        <select name="status">
                            <option value="1" <?php $equipment->status == AVAILABLE ? print "selected" : print ""; ?>>
                                Available
                            </option>
                            <option value="2" <?php $equipment->status == SOLD ? print "selected" : print ""; ?>>Sold
                            </option>
                        </select>
                    </p>

                </div>
                <div class="">
                    <input type="submit" class="btn btn-info" value="Save Details">
                </div>
            </form>
            <form method="post">
                <input type="hidden" value="<?php print $equipment->id ?>" name="id">
                <input type="hidden" value="1" name="editEquipHashtag">

                <div class="">
                    <hr>
                    Tags:<br><br>

                    <p class="hashtags">

                        <?php foreach ($tagList as $id => $tag) : ?>
                            <label><input <?php isset($equipment->tags[$id]) ? print "checked" : print "" ?> value="1"
                                                                                                             type="checkbox"
                                                                                                             name="<?php print $equipment->id . "_" . $id ?>"> <?php print $tag ?>
                            </label>
                            &nbsp&nbsp&nbsp&nbsp
                        <?php endforeach; ?>
                    </p>

                    <div class="">
                        <input type="submit" class="btn btn-info" value="Save Hashtags">
                    </div>

                </div>
            </form>
        </div>
    </div>
    <hr>
<?php endforeach; ?>