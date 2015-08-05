<?php
require_once("forAllPages.php");


include("partials/header.partial.php");

?>

<div class="container" style="background-color: white; width:60%; padding:15px">
    <form class="form-horizontal">

        <div class="form-group">
            <label for="userID" class="col-sm-3">Email</label>

            <div class="inline-block col-sm-6">
                <input class="form-control" type="text" id="Email" placeholder="Email;">
            </div>
        </div>

        <div class="form-group">
            <label for="userID" class="col-sm-3">Contact No.</label>

            <div class="inline-block col-sm-6">
                <input class="form-control" type="text" id="contactno" placeholder="Contact No.">
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-3">
                <select id="opts" onchange="showForm()">
                    <option value="0"></option>
                    <option value="1">MapleSEA</option>
                    <option value="2">HP (whatsapp only)</option>
                    <option value="3">HP (SMS only)</option>
                    <option value="4">HP (wechat only)</option>
                </select>
            </div>

            <div id="f1" style="display:none">

                <div class="inline-block col-sm-2">
                    <form name="form1">
                        <select id="opts" onchange="showForm()">
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
            <div id="f2" style="display:none">
                <div class="inline-block col-sm-6">
                    <form name="form2">
                        <input class="form-control" type="text" id="contactno" placeholder="Contact No.">
                    </form>
                </div>
            </div>
            <div class="col-sm-1">
                <a href=""><img src="images/delete102.png" class="s-50"</a>
            </div>
        </div>

        <div class="form-group">
            <div>
                <button type="submit" class="btn btn-default">Add new contact</button>
            </div>
        </div>
        <div class="form-group">
            <div>
                <button type="submit" class="btn btn-default pull-right">Save</button>
            </div>
        </div>
    </form>
</div>


<script type="text/javascript">
    function showForm() {
        var selopt = document.getElementById("opts").value;
        if (selopt == 1) {
            document.getElementById("f1").style.display = "block";
            document.getElementById("f2").style.display = "none";
        }
        if (selopt == 2 || selopt == 3 || selopt == 4) {
            document.getElementById("f2").style.display = "block";
            document.getElementById("f1").style.display = "none";
        }
    }
</script>
