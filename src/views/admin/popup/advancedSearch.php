<?php

use App\Helpers\Arrays;
use App\Helpers\Input;
use App\Helpers\Tools;

?>
<div class="popupPage normalPopup searchPopup">
    <div class="popupHeader">
        <h3>فیلتر</h3>
        <svg xmlns="http://www.w3.org/2000/svg" class="popupClose" width="20px" height="20px" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve"><g><g><polygon points="512,59.076 452.922,0 256,196.922 59.076,0 0,59.076 196.922,256 0,452.922 59.076,512 256,315.076 452.922,512     512,452.922 315.076,256   "/></g></g></svg>
    </div>
    <a href="./">حذف فیلترها</a>
    <div class="popupInputs">
        <?php if ($data->form->page == 'user') { ?>
            <form method="GET" action="./">
                <label for="nameP" class="popupLabel">نام</label>
                <input type="text" class="formInput" name="name" value="<?php echo Input::get('name') ?>">
                <label for="mobileP" class="popupLabel">موبایل</label>
                <input type="text" class="formInput" name="mobile" value="<?php echo Input::get('mobile') ?>">
                <label for="field" class="popupLabel">دسته</label>
                <select class="formInput" name="field">
                    <option value="0">انتخاب دسته</option>
                    <?php echo Tools::option(Arrays::field(), Input::get('field')) ?>
                </select>
                <!-- <input type="text" class="formInput" name="field" value="<?php echo Input::get('field') ?>"> -->

                <input type="submit" value="جستجو" class="btn btn-light later">
            </form>
        <?php } ?>
    </div>
</div>