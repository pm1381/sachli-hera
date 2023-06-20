<?php
?>

<footer class="footer gapBetween mx-auto eachSec">    
    <div class="cols">
        <div class="describe x1">
            <h2>کلینیک ساچلی</h2>
            <p><?php echo $data->form->result->footerText ?></p>
        </div>
        <div class="links x1">
            <div class="eachLink">
                <div class="title">پرطرفدار</div>
                <?php foreach ($data->form->result->footer as $key => $value) { ?>
                    <a href="<?php echo $value->link ?>" class="f1"><?php echo $value->title ?></a>
                <?php } ?>
            </div>
            <div class="eachLink">
                <div class="title">اخرین صفحات</div>
                <?php foreach ($data->form->lastFive as $key => $value) { ?>
                    <a href="<?php echo $value->address ?>" class="f1"><?php echo $value->title ?></a>
                <?php } ?>
            </div>
        </div>
    </div>
    <div id="hera">© کلیه حقوق مادی و معنوی برای کلینیک زیبایی ساچلی محفوظ است. | طراحی سایت: آژانس دیجیتال مارکتینگ هرا</div>
</footer>
