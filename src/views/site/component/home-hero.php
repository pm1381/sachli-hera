<?php

?>

<div class="main homeHero gapBetween mx-auto eachSec">
    <div class="heroData hT1 my-auto">
        <div class="title">
            <h1>کلینیک زیبایی ساچلی</h1>
        </div>
        <div class="description">
            <p><?php echo $data->form->result->heroText ?></p>
        </div>
        <div class="buttons">
            <a href="" class="reserve">رزرو نوبت</a>
            <div class="freeConsultBtn" id="consultBtn">مشاوره رایگان</div>
        </div>
    </div>
    <div class="hT2 images" id="hero-innerScroll">
        <div class="right-side side">
            <?php for ($i=1; $i <= 3; $i++) {  ?>
                <img src="<?php echo ORIGIN . "public/upload/home/hero/image_" . $i . ".jpg" ?>">    
            <?php } ?>
        </div>
        <div class="left-side side">
            <?php for ($i=4; $i <= 6; $i++) {  ?>
                <img src="<?php echo ORIGIN . "public/upload/home/hero/image_" . $i . ".jpg" ?>">    
            <?php } ?>
        </div>
    </div>
</div>
