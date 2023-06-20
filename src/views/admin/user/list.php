<?php

use App\Helpers\Template;
?>

<?php require_once COMPONENT . 'top.php'; ?>
<div class="main">
    <?php require_once COMPONENT . 'menu.php'; ?>
    <?php require_once COMPONENT . 'header.php'; ?>
    <table  bgcolor="black" color="gold" cellspacing="0" cellpadding="0" border="0" class="gapBetween table table-striped table-bordered">
            <tbody>
                <tr class="title">
                    <td width="80" class="titleOptions">ردیف</td>
                    <td class="titleOptions">نام کاربر</td>
                    <td class="titleOptions">دسته</td>
                    <td class="titleOptions">تاریخ فرم</td>
                    <td class="titleOptions">شماره</td>
                    <td class="titleOptions">اقدامات</td>
                </tr>
                <?php $i = 0; ?>
                <?php foreach ($data->form->result as $value) { 
                    $i++?>
                    <tr class="">
                        <td class="rowOptions counter"><?php echo $i ?></td>
                        <td class="rowOptions"><?php echo $value->name . " " . $value->surname ?></td>
                        <td class="rowOptions"><?php echo $value->title ?></td>
                        <td class="rowOptions"><?php echo $value->created_at ?></td>
                        <td class="rowOptions"><?php echo $value->mobile ?></td>
                        <td class="rowOptions d-flex">
                            <form method="POST" action="/sachadmin/user/destroy/<?php echo $value->id ?>/">
                                <button class="ml-1 btn btn-danger">حذف</button>
                            </form>
                            <a class="ml-1 manageActions" href="/sachadmin/user/edit/<?php echo $value->id ?>/">مدیریت</a>
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
<?php require_once POPUP . 'advancedSearch.php'; ?>
<?php require_once COMPONENT . 'footer.php'; ?>
