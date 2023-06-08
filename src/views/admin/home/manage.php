<?php

use App\Classes\Session;
use App\Helpers\Tools;

//print_f($data) ?>

<?php require_once COMPONENT . 'top.php'; ?>
<div class="main">
    <?php require_once COMPONENT . 'menu.php'; ?>
    <?php require_once COMPONENT . 'header.php'; ?>
    <?php $session = new Session(); ?>
    <form method="POST" action="<?php echo $data->form->actionUrl ?>">
        <table cellspacing="0" cellpadding="0" border="0" class="mt-2 gapBetween table table-striped table-bordered">
            <trbody>
                <?php $v = Tools::checkObject($data, 'form');
                    if ($v != "") {
                        $value = Tools::checkObject($v, 'result', null);
                        if ($value == null) {
                            $value = new stdClass();
                        }
                    } else {
                        $value = new stdClass();
                    }
                ?>
                <input type="hidden" name="id" value="<?php echo Tools::checkObject($value, 'id') ?>">
                <tr>
                    <td class="rowOptions">
                        <input name="address" class="manageInput" value="<?php echo Tools::checkObject($value, 'address', $session->getFlash('address')) ?>">
                        <span class="manageSpan">آدرس</span>
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
                        <textarea style="height: 200px;" name="heroText" class="manageInput"><?php echo Tools::checkObject($value, 'heroText', $session->getFlash('heroText')) ?></textarea>
                        <span class="manageSpan">متن بالای صفحه</span>
                    </td>
                </tr>
                <tr>
                    <td class="rowOptions">
                        <textarea style="height: 200px;" name="sampleText" class="manageInput"><?php echo Tools::checkObject($value, 'sampleText', $session->getFlash('sampleText')) ?></textarea>
                        <span class="manageSpan">متن نمومه کار</span>
                    </td>
                </tr>
                <tr>
                    <td class="rowOptions">
                        <textarea style="height: 200px;" name="footerText" class="manageInput"><?php echo Tools::checkObject($value, 'footerText', $session->getFlash('footerText')) ?></textarea>
                        <span class="manageSpan">متن فوتر</span>
                    </td>
                </tr>
                <tr>
                    <td class="rowOptions">
                        <textarea style="height: 200px;" name="articleText" class="manageInput"><?php echo Tools::checkObject($value, 'articleText', $session->getFlash('articleText')) ?></textarea>
                        <span class="manageSpan">متن مقاله</span>
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
