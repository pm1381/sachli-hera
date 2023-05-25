<?php

use App\Helpers\Arrays;
use App\Helpers\Template;
use App\Helpers\Tools;

?>
<?php //print_f($data) ?>

<?php require_once COMPONENT . 'top.php'; ?>
<div class="main">
    <?php require_once COMPONENT . 'sidebar.php'; ?>
    <div class="content">
        <?php require_once COMPONENT . 'header.php'; ?>
        <table cellspacing="0" cellpadding="0" border="0" class="table table-striped table-bordered">
            <tbody>
                <?php $current = $data->form->currentAdmin ?>
                <tr class="title">
                    <td width="40px" class="titleOptions">ردیف</td>
                    <?php if ($data->form->page == 'userDedication') { ?>
                        <td width="30px" class="titleOptions">انتخاب</td>
                    <?php } ?>
                    <td class="titleOptions">نام</td>
                    <?php if ($current->data->isSuper == 1) { ?>
                        <td class="titleOptions">شماره موبایل</td>
                    <?php } ?>
                    <td class="titleOptions moreDetail">دسته بندی</td>
                    <td class="titleOptions moreDetail">نام فایل</td>
                    <td class="titleOptions moreDetail">تاریخ استخراج</td>
                    <td class="titleOptions moreDetail">اپراتور</td>
                    <td class="titleOptions">اقدامات</td>
                </tr>
                <?php $i = 0; ?>
                <?php foreach ($data->form->result as $value) { 
                    $i++?>
                    <?php
                    $readOnly = "";
                    if ($data->form->page == 'user') { ?>
                        <?php $readOnly = "disabled"  ?>
                    <?php } ?>
                    <tr class="eachRow mainRow">
                        <td class="rowOptions counter"><?php echo $i ?></td>
                        <?php if ($data->form->page == 'userDedication') { ?>
                            <td class="rowOptions">
                                <input type="checkbox" class="checkboxInput" value="<?php echo $value->id ?>" name="selectUser[]">
                            </td>
                        <?php } ?>
                        <td class="rowOptions"><?php echo $value->name ?></td>
                        <?php if ($current->data->isSuper == 1) { ?>
                            <td class="rowOptions"><?php echo $value->mobile ?></td>
                        <?php } ?>
                        <td class="rowOptions moreDetail"><?php echo $value->categoryTitle ?></td>
                        <td class="rowOptions moreDetail"><?php echo $value->fileName ?></td>
                        <td class="rowOptions moreDetail"><?php echo $value->created_at ?></td>
                        <td class="rowOptions moreDetail">
                            <select class="rowOptions form-control w-100 selectChange" data-id="<?php echo $value->id ?>" name="passCall" <?php echo $readOnly ?>>
                                <option value="0" data-name="">انتخاب کنید</option> <?php echo Tools::option(Arrays::admins(), Tools::checkObject($value, 'adminId')) ?>
                            </select>
                        </td>
                        <td class="rowOptions d-flex">
                            <?php if ($data->form->page == 'user') { ?>
                                <?php if ($current->data->isSuper == 1 || ($current->data->passCall == 1 && $current->data->id == $value->adminId)) { ?>
                                    <a class="ml-1 btn btn-secondary transferShow moreDetail" data-name="<?php echo $value->name ?>" data-admin="<?php echo $value->adminId ?>" data-id="<?php echo $value->id ?>">انتقال</a>
                                <?php } ?>
                            <?php } ?>
                            <a class="ml-1 btn btn-info" href="<?php echo ADMIN_ORIGIN . '/user/manage/' . $value->id . "/" ?>">مدیریت</a>
                            <a class="ml-1 btn btn-warning report moreDetail" data-id="<?php echo $value->id ?>">گزارش</a>
                            <form method="POST" action="./delete/<?php echo $value->id . "/" ?>"><input type="submit" value="حذف" class="ml-1 moreDetail btn btn-danger"></form>
                            <div class="moreInfo ml-1 btn btn-dark" data-id="<?php echo $value->id ?>">بیشتر</div>
                        </td>
                    </tr>
                    <tr class="supportingRow">
                        <td colspan="20" class="supporingTD">
                            <div class="supportingData">
                                <p><?php echo 'دسته بندی : ' . $value->categoryTitle ?></p>
                                <p><?php echo 'فایل : ' . $value->fileName ?></p>
                                <p><?php echo 'تاریخ میلادی : ' . $value->created_at ?></p>
                                <p><?php echo 'اپراتور : ' . $value->adminName ?></p>
                                <select class="rowOptions form-control w-100 selectChange" data-id="<?php echo $value->id ?>" name="passCall" <?php echo $readOnly ?>>
                                    <option value="0" data-name="">انتخاب کنید</option> <?php echo Tools::option(Arrays::admins(), Tools::checkObject($value, 'adminId')) ?>
                                </select>
                            </div>
                            <div class="supporingAction">
                                <a class="ml-1 btn btn-warning report" data-id="<?php echo $value->id ?>">گزارش</a>
                                <form method="POST" action="./delete/<?php echo $value->id . "/" ?>"><input type="submit" value="حذف" class="ml-1 btn btn-danger"></form>
                                <?php if ($data->form->page == 'user') { ?>
                                    <?php if ($current->data->isSuper    == 1 || ($current->data->passCall == 1 && $current->data->id == $value->adminId)) { ?>
                                        <a class="ml-1 btn btn-secondary transferShow " data-name="<?php echo $value->name ?>" data-admin="<?php echo $value->adminId ?>" data-id="<?php echo $value->id ?>">انتقال</a>
                                    <?php } ?>
                                <?php } ?>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
                <?php if (count($data->form->result) == 0) { ?>
                    <?php echo '<tr style="text-align:center">موردی یافت نشد</tr>' ?>
                <?php } ?>
            </tbody>
        </table>
        <?php if ($data->form->page == 'userDedication') { ?>
            <div class="groupMoves">
                <div class="btn btn-primary selectAll groupButton">انتخاب همه</div>
                <div class="btn btn-primary unselectAll groupButton">برداشتن همه</div>
                <select class="form-control selectChangeAll">
                    <option value="0" data-name="">انتخاب جمعی</option> <?php echo Tools::option(Arrays::admins()) ?>
                </select>
            </div>
        <?php } ?>
        <?php echo Template::adminNavigation($data->form->countAll, LIMIT); ?>
    </div>
</div>
<?php require_once POPUP . 'advancedSearch.php'; ?>
<?php require_once POPUP . 'report.php'; ?>
<?php require_once POPUP . 'transfer.php'; ?>

<?php require_once COMPONENT . 'footer.php'; ?>
