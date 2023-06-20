<?php

?>

<div class="main landingHero gapBetween mx-auto eachSec">
    <div class="heroData hT1 landing-ht">
        <div class="title">
            <h1><?php echo $data->form->result->title ?></h1>
        </div>
        <div class="description">
            <p><?php echo $data->form->result->description ?></p>
            <!-- <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Harum esse, nihil id ipsam accusamus porro aspernatur placeat suscipit quaerat repellat voluptatum, commodi quidem, molestias optio. A doloribus impedit recusandae aspernatur.lorem</p> -->
        </div>
        <div class="buttons">
            <a href="" class="reserve">رزرو نوبت</a>
            <a href="#FreeConsult-landing" class="freeConsultBtn" id="consultBtn">مشاوره رایگان</a>
        </div>
    </div>
    <div class="hT2">
        <img src="<?php echo ORIGIN . "public/upload/landing/main_" . $data->form->result->id . "_1.jpg" ?>">
    </div>
</div>
