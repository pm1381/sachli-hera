<?php

use App\Classes\Session;
use App\Helpers\Tools;

// print_f($_SESSION) ?>

<?php require_once COMPONENT . 'top.php'; ?>
<div class="main">
    <h3 class="manageTitle">مدیریت  صفحات ثابت</h3>
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
                        <input name="title" class="manageInput" value="<?php echo Tools::checkObject($value, 'title', $session->getFlash('title')) ?>">
                        <span class="manageSpan">عنوان</span>
                    </td>
                </tr>
                <tr>
                    <td class="rowOptions">
                        <input name="address" class="manageInput" value="<?php echo Tools::checkObject($value, 'address', $session->getFlash('address')) ?>">
                        <span class="manageSpan">آدرس</span>
                    </td>
                </tr>
                <tr>
                    <td class="rowOptions">
                        <textarea style="height: 200px;" name="description" class="manageInput"><?php echo Tools::checkObject($value, 'description', $session->getFlash('title')) ?></textarea>
                        <span class="manageSpan">توضیحات</span>
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
