<?php

use App\Classes\Session;
use App\Helpers\Input;
use App\Helpers\Tools;

$session = new Session();?>
<?php $warning = $session->getFlash('warning') ?>
<?php $error = $session->getFlash('error') ?>
<?php $done = $session->getFlash('done') ?>
<?php if ($error != "") { ?>
    <p class="bg-danger text-center session gapBetween"><?php echo $error ?></p>
<?php } ?>
<?php if ($warning != "") { ?>
    <p class="bg-warning text-center session gapBetween"><?php echo $warning ?></p>
<?php } ?>
<?php if ($done != "") { ?>
    <p class="bg-success text-center session gapBetween"><?php echo $done ?></p>
<?php } ?>
<div class="pageToolBox gapBetween">
    <form class="search" action="./">
        <input name="search" class="searchInput" type="text" placeholder="جستجو .." value="<?php echo Input::get('search'); ?>" />
        <input type="submit" class="effect searchIcon" value="" />
    </form>
    <div class="headerButtons">
        <?php if ($data->form->page == 'user') { ?>
            <div class="btn btn-light new headerFilter">فیلتر</div>
        <?php } ?>
        <?php if ($data->form->page != 'user') { ?>
            <a href="/sachadmin/<?php echo $data->form->page . "/show/" ?>" class="btn btn-light new">ساخت جدید</a>
        <?php } ?>
    </div>
</div>