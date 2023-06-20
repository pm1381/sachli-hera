<?php //print_f($data) ?>

<div class="videoMain gapBetween mx-auto eachSec" style="background-color: #fff">
    <div class="single-item">
        <?php foreach ($data->form->video as $key => $value) { ?>
            <iframe class="eachVideo" src="<?php echo $value->link ?>" allowfullscreen></iframe>
        <?php } ?>
    </div>
</div>