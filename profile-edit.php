<?php
require_once("forAllPages.php");
require_once("services/user.service.php");

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
}

$userService = new UserService();
$currentUser = $userService->getUserByUsername($_SESSION['username']);
//var_dump($currentUser);

include("partials/header.partial.php");

?>
<div style="height: 40px"></div>
<h1 style="margin-left: 30px"><img src="images/wrench77.png" style="display: inline-block"> Settings</h1>
<div style="height: 20px"></div>
<div class="container" style="background-color: white; width:50%; padding:15px; float: left; margin-left: 40px">
    <form class="form-horizontal contactRows">
        Leave any text box blank if you do not wish to display those details on your profile page.
        <div style="height: 30px"></div>
        <div class="form-group">
            <label for="Email" class="col-sm-3 control-label">Email</label>

            <div class="inline-block col-sm-6">
                <input name="email" class="form-control" type="text" id="Email" placeholder="Email" value="<?php sizeof($currentUser->contactContainer[1]) > 0 ? print $currentUser->contactContainer[1][0]->value : print "";?>">
            </div>
        </div>

        <div class="form-group">
            <label for="contactno" class="col-sm-3 control-label">Contact No.</label>

            <div class="inline-block col-sm-6">
                <input name="contact" class="form-control" type="text" id="mobile" placeholder="Contact No." value="<?php sizeof($currentUser->contactContainer[2]) > 0 ? print $currentUser->contactContainer[2][0]->value : print "";?>">
            </div>
        </div>


        <div id="entire_row_1" class="form-group">

            <div class="col-sm-3">
                <select class="form-control" id="row_1" onchange="showForm(this)">
                    <option value="0"></option>
                    <option value="1">MapleSEA</option>
                    <option value="2">HP (whatsapp only)</option>
                    <option value="3">HP (SMS only)</option>
                    <option value="4">HP (wechat only)</option>
                </select>
            </div>

            <div id="row1_1" style="display:none">

                <div class="inline-block col-sm-2">
                    <form name="form1">
                        <select class="form-control" >
                            <option value="0">Aquila</option>
                            <option value="1">Bootes</option>
                            <option value="2">Cassaopeia</option>
                            <option value="3">Delphinus</option>
                            <option value="4">Eridanus</option>
                            <option value="5">Izar</option>
                            <option value="6">Jynarvis</option>
                        </select>
                    </form>
                </div>

                <div class="inline-block col-sm-4">
                    <input class="form-control" type="text" id="IGN" placeholder="IGN">
                </div>
            </div>
            <div id="row1_2" style="display:none">
                <div class="inline-block col-sm-6">
                    <form name="form2">
                        <input class="form-control" type="text" id="contactno" placeholder="Contact No.">
                    </form>
                </div>
            </div>
            <div class="col-sm-1">
                <a href="" id="delete_1" onclick="deleteRow(this);return false;"><img src="images/delete102.png" class="s-50"></a>
            </div>
        </div>


        <div class="form-group">
            <div class="col-sm-1">

                <button id="addNewContact" onclick="return false;" type="button" class="btn btn-default">Add new
                    contact
                </button>
            </div>

        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-danger pull-right">Save</button>
        </div>

    </form>
</div>


<script type="text/javascript">

    var newRowNumber = 2;
    function showForm(obj) {
        var rowNumber = obj.id.split('_')[1];
        var selopt = obj.value;
        if (selopt == 1) {
            document.getElementById("row" + rowNumber + "_1").style.display = "block";
            document.getElementById("row" + rowNumber + "_2").style.display = "none";
        }
        if (selopt == 2 || selopt == 3 || selopt == 4) {
            document.getElementById("row" + rowNumber + "_2").style.display = "block";
            document.getElementById("row" + rowNumber + "_1").style.display = "none";
        }
    }

    function deleteRow(obj) {
        var rowNumber = obj.id.split('_')[1];  // get object idusing obj.id. split using "_" as delimiter resulting in array. get 2nd element of array using [1].
        console.log(rowNumber); // Use console.log(variable) to debug in javascript/jquery
        $("#entire_row_" + rowNumber).remove(); // I added an ID to the entire package for easier referencing. If you did the multiple selecotr thing you would missout the
        // line 36 div as it is not within the selector.
        // After selecting using $("#entire_row_" + rowNumber), we are given the entire set of html which we then choose to remove.

    }

    $(document).ready(function () {
        $("#addNewContact").click(function () {
            $(".contactRows").append('<div class="form-group" id="entire_row_' + newRowNumber + '"> <div class="col-sm-3"> ' +
                '<select id="row_' + newRowNumber + '" onchange="showForm(this)"> <option value="0"></option> <option value="1">MapleSEA</option> <option value="2">HP (whatsapp only)</option> <option value="3">HP (SMS only)</option> <option value="4">HP (wechat only)</option> </select> </div>' +
                '<div id="row' + newRowNumber + '_1" style="display:none"> <div class="inline-block col-sm-2"> <form name="form1"> <select id="opts" onchange="showForm()"> <option value="0">Aquila</option> <option value="1">Bootes</option> <option value="2">Cassaopeia</option> <option value="3">Delphinus</option> <option value="4">Eridanus</option> <option value="5">Izar</option> <option value="6">Jynarvis</option> </select> </form> </div><div class="inline-block col-sm-4"> <input class="form-control" type="text" id="IGN" placeholder="IGN"> </div></div>' +
                '<div id="row' + newRowNumber + '_2" style="display:none"> <div class="inline-block col-sm-6"> <form name="form2"> <input class="form-control" type="text" id="contactno" placeholder="Contact No."> </form> </div></div><div class="col-sm-1"><ah href="" onclick="deleteRow(this);return false;" id="delete_' + newRowNumber + '"> <img src="images/delete102.png" class="s-50"></a></div></div>');
            newRowNumber++;
        });
/*
        $("#delete_" + newRowNumber).click(function () {
            console.log(e);
            $(".form-group").remove("#row_" + newRowNumber, "#row" + newRowNumber + "_1", "#row" + newRowNumber + "_2");
        });
        */
    });


</script>