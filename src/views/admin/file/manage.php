<?php

use App\Helpers\Arrays;
use App\Helpers\Tools;

//print_f($data) ?>

<?php require_once COMPONENT . 'top.php'; ?>
<div class="main">
    <?php require_once COMPONENT . 'sidebar.php'; ?>
    <div class="content">
        <?php require_once COMPONENT . 'header.php'; ?>
        <form enctype="multipart/form-data" method="POST" action="<?php echo $data->form->actionUrl ?>">
            <table cellspacing="0" cellpadding="0" border="0" class="table table-striped table-bordered">
                <trbody>
                    <?php $v = Tools::checkObject($data, 'form');
                        if ($v != "") {
                            $value = Tools::checkObject($v, 'result');
                        } else {
                            $value = new stdClass();
                        }
                    ?>
                    <tr>
                        <td class="rowOptions">
                            <input name="name" class="manageInput" value="<?php echo Tools::checkObject($value, 'name') ?>">
                            <span class="manageSpan">نام</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="rowOptions">
                            <input class="manageInput" value="<?php echo Tools::checkObject($value, 'created_at') ?>" readonly>
                            <span class="manageSpan">تاریخ استخراج</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="rowOptions">
                            <textarea name="description" style="padding-top:30px;" class="form-control" ><?php echo Tools::checkObject($value, 'description') ?></textarea>
                            <span class="manageSpan">توضیحات</span>
                        </td>
                    </tr>
                    <?php //print_f(Tools::option(Arrays::categories(), Tools::checkObject($value, 'category')), true) ?>
                    <tr>
                        <td class="rowOptions">
                            <select class="form-control w-100 selectCHK" name="category">
                                <option value="0" data-name="">انتخاب کنید</option> <?php echo Tools::option(Arrays::categories(), Tools::checkObject($value, 'category')) ?>
                            </select>
                            <span class="manageSpan">دسته بندی</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="rowOptions">
                            <div class="manageFile form-input">
                                <span>انتخاب فایل...</span>
                                <input type="file" name="excelFile">
                            </div>
                            <span class="manageSpan">فایل</span>
                        </td>
                    </tr>
                    <?php if ($data->form->file != null) { ?>
                        <tr>
                            <td class="rowOptions">
                                <a href="<?php echo ORIGIN . 'public/upload/' . 'excel/file_' . $value->id . '.xlsx' ?>" download>دانلود فایل بارگذاری شده</a>
                            </td>
                        </tr>
                    <?php } ?>
                    <?php 
                    $colarray = (array) Tools::checkObject($value, 'columns', []);
                    $keys = array_keys($colarray);
                    $values = array_values($colarray);
                    ?>
                    <tr>
                        <td class="rowOptions">
                            <div class="manageCheckBox allColumns">
                                <div class="eachColumn spec">
                                    <div class="each">
                                        <select class="columnsKey inputElm columnsI" name="columnsKey[]" required>
                                            <option value="0" data-name="">انتخاب</option> <?php echo Tools::option(Arrays::englishAlphabet(), array_search ('mobile', $colarray)) ?>
                                        </select>
                                        <span>ستون</span>
                                    </div>
                                    <div class="each">
                                        <input type="text" class="columnsValue columnsI" value="mobile" name="columnsValue[]" readonly>
                                        <span>عنوان</span>
                                    </div>
                                </div>
                                <div class="eachColumn spec">
                                    <div class="each">
                                        <select class="columnsKey inputElm columnsI" name="columnsKey[]" required>
                                            <option value="0" data-name="">انتخاب</option> <?php echo Tools::option(Arrays::englishAlphabet(), array_search ('name', $colarray)) ?>
                                        </select>
                                        <span>ستون</span>
                                    </div>
                                    <div class="each">
                                        <input type="text" class="columnsValue columnsI" value="name" name="columnsValue[]" readonly>
                                        <span>عنوان</span>
                                    </div>
                                    <div class="columnsAction">
                                        <div class="addAction action plus">+</div>
                                        <div class="minusAction action minus">-</div>
                                    </div>
                                </div>
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
                                    <?php if ($value != 'mobile' && $value != 'name') { ?>
                                        <div class="eachColumn">
                                            <div class="each">
                                                <select class="columnsKey inputElm columnsI" name="columnsKey[]">
                                                    <option value="0" data-name="">انتخاب</option> <?php echo Tools::option(Arrays::englishAlphabet(), $key) ?>
                                                </select>
                                                <span>ستون</span>
                                            </div>
                                            <div class="each">
                                                <input type="text" class="columnsValue columnsI" value="<?php echo $value ?>" name="columnsValue[]">
                                                <span>عنوان</span>
                                            </div>
                                            <div class="columnsAction">
                                                <div class="addAction action plus">+</div>
                                                <div class="minusAction action minus">-</div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <?php $i++; ?>
                                <?php  } while ($i < count($colarray)); ?>
                            </div>
                            <span class="manageSpan">ستونها</span>
                        </td>
                    </tr>
                </trbody>
            </table>
            <input type="submit" value="ثبت و ارسال" class="manageFormSubmit btn btn-info w-100">
        </form>
    </div>
</div>
<?php require_once COMPONENT . 'footer.php'; ?>
