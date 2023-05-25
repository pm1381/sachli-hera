<?php

use App\Helpers\Arrays;
use App\Helpers\Tools;

//print_f($data) ?>

<?php require_once COMPONENT . 'top.php'; ?>
<div class="main">
    <?php require_once COMPONENT . 'sidebar.php'; ?>
    <div class="content">
        <?php require_once COMPONENT . 'header.php'; ?>
        <?php $v = Tools::checkObject($data, 'form');
        if ($v != "") {
            $value = Tools::checkObject($v, 'result');
        } else {
            $value = new stdClass();
        }?>
        <?php $postUrl = $data->form->actionUrl;
        if (Tools::checkObject($data->form, 'backTo') && $data->form->backTo != "") {
            $postUrl = $data->form->actionUrl . "?backTo=" . $data->form->backTo;
        }
        ?>
        <form method="POST" action="<?php echo $postUrl ?>">
            <table cellspacing="0" cFellpadding="0" border="0" class="table table-striped table-bordered">
                <trbody>
                    <?php $current = $data->form->currentAdmin ?>
                    <?php
                    $isSuper = 0; 
                    $editable = "disabled";
                    $readOnly = "readOnly";
                    if ($current->data->isSuper == 1) { ?>
                        <?php 
                        $readOnly = "";
                        $editable = "";
                        $isSuper = 1;
                        ?>
                    <?php } ?>
                    <tr>
                        <td class="rowOptions">
                            <input name="name" class="manageInput" value="<?php echo Tools::checkObject($value, 'name') ?>" <?php echo $readOnly ?>>
                            <span class="manageSpan">نام</span>
                        </td>
                    </tr>
                    <?php if ($isSuper) { ?>
                        <tr>
                            <td class="rowOptions">
                                <input name="mobile" class="manageInput" value="<?php echo Tools::checkObject($value, 'mobile') ?>">
                                <span class="manageSpan">موبایل</span>
                            </td>
                        </tr>
                    <?php } ?>
                    <tr>
                        <td class="rowOptions multipleOptions">
                            <div class="rowDivide">
                                <input name="admin" type="text" class="manageInput" value="<?php echo Tools::checkObject($value, 'adminName') ?>" readonly>
                                <span class="manageSpan">اپراتور</span>
                            </div>
                            <div class="rowDivide">
                                <select class="form-control selectCHK w-100" name="file" <?php echo $editable ?>>
                                    <option value="0" data-name="">انتخاب کنید</option> <?php echo Tools::option(Arrays::files(), Tools::checkObject($value, 'file')) ?>
                                </select>
                                <span class="manageSpan">فایل</span>
                            </div>
                        </td>
                    </tr>
                    <?php if (Tools::checkObject($value, 'text') && $value->text != "") { ?>
                        <tr>
                            <td class="rowOptions">
                                <textarea style="padding-top:30px;color:red" class="form-control" readonly><?php echo $value->text ?></textarea>
                                <span class="manageSpan">گزارش ثبت شده</span>
                            </td>
                        </tr>
                    <?php } ?>
                    <tr>
                        <td class="rowOptions">
                            <input class="manageInput" value="<?php echo Tools::checkObject($value, 'created_at') ?>" readonly>
                            <span class="manageSpan">تاریخ استخراج</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="rowOptions">
                            <textarea name="description" style="padding-top:30px;" class="form-control"><?php echo Tools::checkObject($value, 'description') ?></textarea>
                            <span class="manageSpan">نتیجه تماس</span>
                        </td>
                    </tr>
                    <?php
                        $colarray = (array) Tools::checkObject($value, 'data', []);
                        $fileArray = (array) Tools::checkObject($data->form, 'fileCols', []);
                        $keys = array_keys($colarray);
                        $values = array_values($colarray);
                    ?>
                    <tr>
                        <td class="rowOptions">
                            <div class="manageCheckBox allColumns">
                                <?php
                                $i = 0;
                                do {?>
                                    <?php 
                                    $key = "";
                                    $value = "";
                                    if (array_key_exists($i, $keys)) {
                                        $key = $keys[$i];
                                        $value = $values[$i];
                                    }
                                    ?>
                                    <div class="eachColumn">
                                        <div class="each">
                                            <select class="columnsKey inputElm columnsI" name="columnsKey[]">
                                                <option value="0" data-name="">انتخاب</option> <?php echo Tools::option(array_values($fileArray), $key) ?>
                                            </select>
                                            <span>ستون</span>
                                        </div>
                                        <div class="each">
                                            <input type="text" class="columnsValue columnsI" value="<?php echo $value ?>" name="columnsValue[]">
                                            <span>مقدار</span>
                                        </div>
                                        <div class="columnsAction">
                                            <div class="addAction action plus">+</div>
                                            <div class="minusAction action minus">-</div>
                                        </div>
                                    </div>
                                    <?php $i++; ?>
                                <?php  } while ($i < count($colarray)); ?>
                            </div>
                            <span class="manageSpan">داده ها</span>
                        </td>
                    </tr>
                </trbody>
            </table>
            <input type="submit" value="ثبت و ارسال" class="manageFormSubmit btn btn-info w-100">
        </form>
    </div>
</div>
<?php require_once COMPONENT . 'footer.php'; ?>
