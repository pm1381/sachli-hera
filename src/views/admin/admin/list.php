<?php

use App\Helpers\Template;

?>
<?php //print_f($data) ?>

<?php require_once COMPONENT . 'top.php'; ?>
<!-- require_once COMPONENT . 'top.php'; -->
<div class="main">
    <?php require_once COMPONENT . 'sidebar.php'; ?>
    <div class="content">
        <?php require_once COMPONENT . 'header.php'; ?>
        <table cellspacing="0" cellpadding="0" border="0" class="table table-striped table-bordered">
            <tbody>
                <tr class="title">
                    <td width="40px" class="titleOptions">ردیف</td>
                    <td class="titleOptions">نام</td>
                    <td class="titleOptions">شماره موبایل</td>
                    <td class="titleOptions">اقدامات</td>
                </tr>
                <?php $i = 0; ?>
                <?php foreach ($data->form->result as $value) { 
                    $i++?>
                    <tr class="eachRow">
                        <td class="rowOptions counter"><?php echo $i ?></td>
                        <td class="rowOptions"><?php echo $value->name ?></td>
                        <td class="rowOptions"><?php echo $value->mobile ?></td>
                        <td class="rowOptions d-flex">
                            <a class="ml-1 btn btn-info" href="./manage/<?php echo $value->id . "/" ?>">مدیریت</a>
                            <form method="POST" action="./delete/<?php echo $value->id . "/" ?>"><input type="submit" value="حذف" class="ml-1 btn btn-danger"></form>
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
