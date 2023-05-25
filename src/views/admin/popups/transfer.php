<?php 
    use App\Helpers\Arrays;
    use App\Helpers\Tools;
?>
<div class="popupPage normalPopup transferPopup">
    <div class="popupHeader">
        <h3>انتقال</h3>
        <svg xmlns="http://www.w3.org/2000/svg" class="popupClose" width="20px" height="20px" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve"><g><g><polygon points="512,59.076 452.922,0 256,196.922 59.076,0 0,59.076 196.922,256 0,452.922 59.076,512 256,315.076 452.922,512     512,452.922 315.076,256   "/></g></g></svg>
    </div>
    <form method="POST" action="<?php echo ADMIN_ORIGIN . '/user/transfer/' ?>">
        <label for="fromP" class="popupLabel">از</label>
        <select class="formInput w-100 setFrom" name="fromP">
            <option value="0">انتخاب کنید</option><?php echo Tools::option(Arrays::admins()) ?>
        </select>
        <input type="hidden" name="user" value="0" class="userHidden">
        <label for="toP" class="popupLabel">به</label>
        <select class="formInput w-100" name="toP">
            <option value="0">انتخاب کنید</option><?php echo Tools::option(Arrays::admins()) ?>
        </select>
        <input type="submit" value="انتقال" class="btn btn-primary later">
    </form>
</div>