<?php
//$uploadedContainer - Contains all Uploaded objects that are listed
//$equipTagArray - Contains all equipTags
//$categorisedEquipTag - Contains equipTags in categories for printing out of filter

$categoryType = array('Set', 'Class', 'Weapons', 'Armors');
shuffle($uploadedContainer);

include("partials/header.partial.php");
?>

<br><br>
<div class="col-sm-3">
    <h2 class="filter-sidebar" style="font-size: 25px">FILTER BY</h2>

    <div class="container-fluid filter-sidebar" style="background-color: white;">
        <?php foreach ($categorisedEquipTag as $categoryID => $equipTags) : ?>
            <div class="filter-header">
                <a href="#<?php print $categoryType[$categoryID]; ?>" data-toggle="collapse">
                    <h3><?php print $categoryType[$categoryID]; ?></h3></a>
            </div>
            <div class="filter-body collapse in" id="<?php print $categoryType[$categoryID]; ?>">
                <?php foreach ($equipTags as $tagID=>$equipTag) : ?>
                    <div class="checkbox">
                        <label draggable="true">
                            <input type="checkbox" value="<?php print $equipTag->value; ?>"
                                   onclick="checkboxClicked()"
                                   class="sh-active-element checkbox-tag"><?php print $equipTag->value; ?></label>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<div class="col-sm-9" style="top: 25px">
    <div class="col-sm-12">

        <?php foreach ($uploadedContainer as $uploaded) : ?>
            <div class="col-sm-4 weapons nopadding-right" id="uploaded_<?php print $uploaded->id;?>">
                <div class="panel panel-default">
                    <div class="panel-heading"><?php print $uploaded->name; ?></div>
                    <div class="panel-body"><img src="<?php print $uploaded->imageURL; ?>" class="dynamic"></div>
                    <div class="panel-body nopadding-top" style="text-align: left">Uploaded
                        by: <?php print $uploaded->username; ?></div>
                    <?php if (!empty($uploaded->mesoPrice)) : ?>
                        <div class="panel-footer"> Mesos: <?php print $uploaded->mesoPrice; ?></div>
                    <?php endif; ?>
                    <?php if (!empty($uploaded->realPrice)) : ?>
                        <div class="panel-footer"> Cash: <?php print $uploaded->realPrice; ?></div>
                    <?php endif; ?>
                    <div hidden id="uploadtag_<?php print $uploaded->id ?>">
                        <?php foreach ($uploaded->taggingArray as $tag) :?>
                            <?php print $equipTagArray[$tag->tagID]->value . " ";?>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

    </div>
</div>

<script type="text/javascript">
    function checkboxClicked() {
        var checkedBoxes = $('.checkbox-tag:checkbox:checked');
        var taggroup = $("[id*=uploadtag]");
        var filtervalues = [];
        var i;
        for (i =0; i < checkedBoxes.length; i++) {
            filtervalues.push(checkedBoxes[i].value);
        }
        for (i =0; i < taggroup.length; i++) {
            var filterpasses = 0;
            var tags = taggroup[i].innerText.split(' ');
            var j,k;
            for (j =0; j <tags.length;j++) {
                for (k =0; k < filtervalues.length;k++) {
                    console.log(tags[j]);
                    console.log(filtervalues[k]);
                    if (tags[j] == filtervalues[k]) {
                        filterpasses++;

                    }
                }
            }
            var uploadedid = taggroup[i].id.split('_')[1];
            if (filterpasses == filtervalues.length) {
                $("#uploaded_" + uploadedid).show();
            } else {
                $("#uploaded_" + uploadedid).hide();
            }

        }
    }
</script>