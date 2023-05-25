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
                    <td width="30px" class="titleOptions">انتخاب</td>
                    <td class="titleOptions">نام کاربر</td>
                    <td class="titleOptions moreDetail">نام فایل</td>
                    <td class="titleOptions moreDetail">تاریخ گزارش</td>
                    <td class="titleOptions moreDetail">اپراتور</td>
                    <td class="titleOptions">اقدامات</td>
                </tr>
                <?php $i = 0; ?>
                <?php foreach ($data->form->result as $value) { 
                    $i++?>
                    <tr class="eachRow mainRow">
                        <td class="rowOptions counter"><?php echo $i ?></td>
                        <td class="rowOptions">
                            <input type="checkbox" class="checkboxInput" value="<?php echo $value->user ?>" name="selectUser[]">
                        </td>
                        <td class="rowOptions"><?php echo $value->userName ?></td>
                        <td class="rowOptions moreDetail"><?php echo $value->fileName ?></td>
                        <td class="rowOptions moreDetail"><?php echo $value->created_at ?></td>
                        <td class="rowOptions moreDetail">
                            <select class="rowOptions form-control w-100 selectChange" data-id="<?php echo $value->user ?>" name="passCall">
                                <option value="0" data-name="">انتخاب کنید</option> <?php echo Tools::option(Arrays::admins(), Tools::checkObject($value, 'admin')) ?>
                            </select>
                        </td>
                        <td class="rowOptions d-flex">
                            <a class="ml-1 btn btn-info" href="<?php echo ADMIN_ORIGIN . '/user/manage/' . $value->user . "/" . "?backTo=" . $data->form->backTo ?>">مدیریت</a>
                            <form method="POST" action="./delete/<?php echo $value->id . "/" ?>"><input type="submit" value="حذف" class="ml-1 moreDetail btn btn-danger"></form>
                            <div class="ml-1 btn btn-secondary moreDetail returnToPrev" data-id="<?php echo $value->id ?>" data-user="<?php echo $value->user ?>">برگرداندن</div>
                            <div class="ml-1 btn btn-warning moreDetail reportShow" data-id="<?php echo $value->id ?>">خطا</div>
                            <div class="moreInfo ml-1 btn btn-dark" data-id="<?php echo $value->id ?>">بیشتر</div>
                        </td>
                    </tr>
                    <tr class="supportingRow">
                        <td colspan="20" class="supporingTD">
                            <div class="supportingData">
                                <p><?php echo 'فایل : ' . $value->fileName ?></p>
                                <p><?php echo 'تاریخ : ' . $value->created_at ?></p>
                                <p><?php echo 'اپراتور : ' . $value->adminName ?></p>
                                <select class="rowOptions form-control w-100 selectChange" data-id="<?php echo $value->user ?>" name="passCall">
                                    <option value="0" data-name="">انتخاب کنید</option> <?php echo Tools::option(Arrays::admins(), Tools::checkObject($value, 'admin')) ?>
                                </select>
                            </div>
                            <div class="supporingAction">
                                <form method="POST" action="./delete/<?php echo $value->id . "/" ?>"><input type="submit" value="حذف" class="ml-1 btn btn-danger"></form>
                                <div class="ml-1 btn btn-secondary returnToPrev" data-id="<?php echo $value->id ?>" data-user="<?php echo $value->user ?>">برگرداندن</div>
                            <div class="ml-1 btn btn-warning reportShow" data-id="<?php echo $value->id ?>">خطا</div>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
                <?php if (count($data->form->result) == 0) { ?>
                    <?php echo '<tr style="text-align:center">موردی یافت نشد</tr>' ?>
                <?php } ?>
            </tbody>
        </table>
        <div class="groupMoves">
            <div class="btn btn-primary selectAll groupButton">انتخاب همه</div>
            <div class="btn btn-primary unselectAll groupButton">برداشتن همه</div>
            <select class="form-control selectChangeAll">
                <option value="0" data-name="">انتخاب جمعی</option> <?php echo Tools::option(Arrays::admins()) ?>
            </select>
        </div>
        <?php echo Template::adminNavigation($data->form->countAll, LIMIT); ?>
    </div>
</div>
<?php require_once POPUP . 'reportText.php'; ?>
<?php require_once COMPONENT . 'footer.php'; ?>
