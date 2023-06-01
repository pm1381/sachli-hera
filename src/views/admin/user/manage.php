<?php

use App\Classes\Session;
use App\Helpers\Tools;

//print_f($data) ?>

<?php require_once COMPONENT . 'top.php'; ?>
<div class="main">
    <h3 class="manageTitle">مدیریت کاربر</h3>
    <?php $session = new Session();
    $error = $session->getFlash('error'); ?>
    <?php if ($error != "") { ?>
        <p class="bg-danger text-center session gapBetween"><?php echo $error ?></p>
    <?php } ?>
    <form method="POST" action="<?php echo $data->form->actionUrl ?>">
        <table cellspacing="0" cellpadding="0" border="0" class="mt-2 gapBetween table table-striped table-bordered">
            <trbody>
                <?php $v = Tools::checkObject($data, 'form');
                    if ($v != "") {
                        $value = Tools::checkObject($v, 'result');
                    } else {
                        $value = new stdClass();
                    }
                ?>
                <input type="hidden" name="id" value="<?php echo Tools::checkObject($value, 'id') ?>">
                <tr>
                    <td class="rowOptions">
                        <input name="name" class="manageInput" value="<?php echo Tools::checkObject($value, 'name', $session->getFlash('name')) ?>">
                        <span class="manageSpan">نام</span>
                    </td>
                </tr>
                <tr>
                    <td class="rowOptions">
                        <input name="surname" class="manageInput" value="<?php echo Tools::checkObject($value, 'surname', $session->getFlash('surname')) ?>">
                        <span class="manageSpan">نام خانوادگی</span>
                    </td>
                </tr>
                <tr>
                    <td class="rowOptions">
                        <input name="mobile" class="manageInput" value="<?php echo Tools::checkObject($value, 'mobile', $session->getFlash('mobile')) ?>">
                        <span class="manageSpan">موبایل</span>
                    </td>
                </tr>
                <tr>
                    <td class="rowOptions">
                        <textarea style="height: 200px;" name="description" class="manageInput"><?php echo Tools::checkObject($value, 'description', $session->getFlash('description')) ?></textarea>
                        <span class="manageSpan">توضیحات کاربر</span>
                    </td>
                </tr>
                <tr>
                    <td class="rowOptions">
                        <textarea style="height: 200px;" name="adminDescription" class="manageInput"><?php echo Tools::checkObject($value, 'adminDescription', $session->getFlash('adminDescription')) ?></textarea>
                        <span class="manageSpan">توضیحات ادمین</span>
                    </td>
                </tr>
            </trbody>
        </table>
        <div class="d-flex align-items-center justify-content-center">
            <input type="submit" value="ثبت و ارسال" class="manageFormSubmit gapBetween btn btn-light w-50">
        </div>
    </form>
</div>
<?php require_once COMPONENT . 'footer.php'; ?>
