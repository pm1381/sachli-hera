<?php ?>
<div class="sample gapBetween mx-auto eachSec">
    <div class="curtain"></div>
    <h2 class="title">نمونه کارهای ساچلی</h2>
    <div class="description">
        <?php echo $data->form->result->sampleText ?>
    </div>
    <div class="images" id="sample-innerScroll">
        <?php for ($i=1; $i <= 6; $i++) {  ?>
            <img src="<?php echo ORIGIN . "public/upload/home/sample/image_" . $i . ".jpg" ?>">    
        <?php } ?>
    </div>
</div>