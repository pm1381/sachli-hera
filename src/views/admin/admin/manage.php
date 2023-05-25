<?php

use App\Helpers\Arrays;
use App\Helpers\Tools;

//print_f($data) ?>

<?php require_once COMPONENT . 'top.php'; ?>
<div class="main">
    <?php require_once COMPONENT . 'sidebar.php'; ?>
    <div class="content">
        <?php require_once COMPONENT . 'header.php'; ?>
        <form method="POST" action="<?php echo $data->form->actionUrl ?>">
            <table cellspacing="0" cellpadding="0" border="0" class="table table-striped table-bordered">
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
                            <input name="name" class="manageInput" value="<?php echo Tools::checkObject($value, 'name') ?>">
                            <span class="manageSpan">نام</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="rowOptions">
                            <input name="mobile" class="manageInput" value="<?php echo Tools::checkObject($value, 'mobile') ?>">
                            <span class="manageSpan">موبایل</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="rowOptions">
                            <input name="password" type="password" class="manageInput" value="">
                            <span class="manageSpan">پسورد</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="rowOptions multipleOptions">
                            <div class="rowDivide">
                                <select class="form-control selectCHK w-100" name="isSuper">
                                    <?php echo Tools::option(Arrays::yesOrNo(), Tools::checkObject($value, 'isSuper')) ?>
                                </select>
                                <span class="manageSpan">ادمین کامل</span>
                            </div>
                            <div class="rowDivide">
                                <select class="form-control selectCHK w-100" name="passCall">
                                    <?php echo Tools::option(Arrays::yesOrNo(), Tools::checkObject($value, 'passCall')) ?>
                                </select>
                                <span class="manageSpan">انتقال</span>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="rowOptions checkBoxOptions">
                            <div class="manageCheckBox">
                                <?php foreach (Tools::adminMenu() as $each) { ?>
                                    <?php $get = (in_array($each['role'], Tools::checkObject($value, 'access', []))) ? 'checked' : '' ?>
                                    <div class="upCheckbox">
                                        <label class="checkbox custom custom_check_0">
                                            <input value="<?php echo $each['role'] ?>" name="role[]" type="checkbox" <?php echo $get ?>>
                                            <?php echo $each['title'] ?>
                                        </label>
                                        <?php if (count($each['child']) > 0) { ?>
                                            <div class="checkboxChild">
                                                <?php foreach ($each['child'] as $eachChild) { ?>
                                                    <div class="upCheckbox">
                                                        <label class="checkbox custom custom_check_1">
                                                            <input value="<?php echo $eachChild['role'] ?>" name="role[]" type="checkbox">
                                                            <?php echo $eachChild['title'] ?>
                                                        </label>        
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        <?php } ?>
                                    </div>
                                <?php } ?>
                                <span class="manageSpan">ادمین کامل</span>
                            </div>
                        </td>
                    </tr>
                </trbody>
            </table>
            <input type="submit" value="ثبت و ارسال" class="manageFormSubmit btn btn-info w-100">
        </form>
    </div>
</div>
<?php require_once COMPONENT . 'footer.php'; ?>
