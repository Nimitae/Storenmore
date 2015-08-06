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