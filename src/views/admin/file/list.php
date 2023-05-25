<?php

use App\Helpers\Template;

?>
<?php //print_f($data) ?>

<?php require_once COMPONENT . 'top.php'; ?>
<div class="main">
    <?php require_once COMPONENT . 'sidebar.php'; ?>
    <div class="content">
        <?php require_once COMPONENT . 'header.php'; ?>
        <table cellspacing="0" cellpadding="0" border="0" class="table table-striped table-bordered">
            <tbody>
                <tr class="title">
                    <td width="40px" class="titleOptions">ردیف</td>
                    <td class="titleOptions">عنوان</td>
                    <td class="titleOptions moreDetail">تاریخ</td>
                    <td class="titleOptions">اقدامات</td>
                </tr>
                <?php $i = 0; ?>
                <?php foreach ($data->form->result as $value) { 
                    $i++?>
                    <tr class="eachRow mainRow">
                        <td class="rowOptions counter"><?php echo $i ?></td>
                        <td class="rowOptions"><?php echo $value->name ?></td>
                        <td class="rowOptions moreDetail"><?php echo $value->created_at ?></td>
                        <td class="rowOptions d-flex">
                            <a class="btn btn-info ml-1" href="./manage/<?php echo $value->id . "/" ?>">مدیریت</a>
                            <form method="POST" action="./delete/<?php echo $value->id . "/" ?>"><input type="submit" value="حذف" class="ml-1 btn btn-danger moreDetail"></form>
                            <?php if ($value->isExtracted == 0) { ?>
                                <div class="btn btn-success extractJs ml-1 moreDetail" data-id="<?php echo $value->id ?>">استخراج</div>
                            <?php } ?>
                            <div class="moreInfo ml-1 btn btn-dark" data-id="<?php echo $value->id ?>">بیشتر</div>
                        </td>
                    </tr>
                    <tr class="supportingRow">
                        <td colspan="20" class="supporingTD">
                            <div class="supportingData">
                                <p><?php echo 'تاریخ میلادی : ' . $value->created_at ?></p>
                            </div>
                            <div class="supporingAction">
                                <form method="POST" action="./delete/<?php echo $value->id . "/" ?>"><input type="submit" value="حذف" class="ml-1 btn btn-danger"></form>
                                <?php if ($value->isExtracted == 0) { ?>
                                    <div class="btn btn-success extractJs ml-1" data-id="<?php echo $value->id ?>">استخراج</div>
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
        <?php echo Template::adminNavigation($data->form->countAll, LIMIT); ?>
    </div>
</div>
<?php require_once COMPONENT . 'footer.php'; ?>
