<?php

?>

<div class="main landingTest gapBetween mx-auto eachSec">
    <div class="heroImage">
        <?php for ($i=1; $i <= 6; $i++) { ?>
            <img src="<?php echo ORIGIN . "public/upload/landing/support_" . $data->form->result->id . "_" . $i . ".jpg" ?>">    
        <?php } ?>
    </div>
</div>
