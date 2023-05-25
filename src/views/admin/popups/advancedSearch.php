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
    <?php $current = $data->form->currentAdmin ?>
    <a href="./">حذف فیلترها</a>
    <div class="popupInputs">
        <?php if ($data->form->page == 'user' || $data->form->page == 'userDedication') { ?>
            <form method="GET" action="./">
                <label for="nameP" class="popupLabel">نام</label>
                <input type="text" class="formInput" name="nameP" value="<?php echo Input::get('nameP') ?>">
                <label for="mobileP" class="popupLabel">موبایل</label>
                <input type="text" class="formInput" name="mobileP" value="<?php echo Input::get('mobileP') ?>">
                <label for="categoryP" class="popupLabel">دسته بندی</label>
                <select class="formInput w-100" name="categoryP">
                    <option value="0">انتخاب کنید</option><?php echo Tools::option(Arrays::categories(), Input::get('categoryP', 0)) ?>
                </select>
                <label for="fileP" class="popupLabel">فایل</label>
                <select class="formInput w-100" name="fileP">
                    <option value="0">انتخاب کنید</option><?php echo Tools::option(Arrays::files(), Input::get('fileP', 0)) ?>
                </select>
        <?php } ?>

        <?php if ($data->form->page == 'userDedication' || $current->data->isSuper) { ?>
            <label for="adminP" class="popupLabel">اپراتور</label>
            <select class="formInput w-100" name="adminP">
                <option value="0">انتخاب کنید</option><?php echo Tools::option(Arrays::admins(), Input::get('adminP', 0)) ?>
            </select>
        <?php } ?>

        <input type="submit" value="جستجو" class="btn btn-primary later">
        </form>
    </div>
</div>