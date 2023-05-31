<?php

use App\Classes\Session;
use App\Helpers\Input;
use App\Helpers\Tools;

$session = new Session();?>
<?php $warning = $session->getFlash('warning') ?>
<?php $error = $session->getFlash('error') ?>
<?php $done = $session->getFlash('done') ?>
<?php if ($error != "") { ?>
    <p class="bg-danger text-center session"><?php echo $error ?></p>
<?php } ?>
<?php if ($warning != "") { ?>
    <p class="bg-warning text-center session"><?php echo $warning ?></p>
<?php } ?>
<?php if ($done != "") { ?>
    <p class="bg-success text-center session"><?php echo $done ?></p>
<?php } ?>
<div class="pageToolBox">
    <form class="search" action="./">
        <input name="search" class="searchInput" type="text" placeholder="جستجو .." value="<?php echo Input::get('search'); ?>" />
        <input type="submit" class="effect searchIcon" value="" />
    </form>
    <div class="headerButtons">
        <div class="btn btn-info new headerFilter  mobileMenu">نمایش منو</div>
        <?php if ($data->form->page == 'user' || $data->form->page == 'userDedication') { ?>
            <div class="btn btn-info new headerFilter">فیلتر</div>
        <?php } ?>
        <?php if ($data->form->page != 'user' && $data->form->page != 'transfer' && $data->form->page != 'report') { ?>
            <a href="<?php echo ADMIN_ORIGIN . Tools::checkObject($data, 'makeNewUrl') ?>" class="btn btn-info new">ساخت جدید</a>
        <?php } ?>
    </div>
</div>