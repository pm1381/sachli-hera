<?php

use App\Helpers\Arrays;
use App\Helpers\Template;
use App\Helpers\Tools;

?>

<?php require_once COMPONENT . 'top.php'; ?>
<div class="main">
    <?php require_once COMPONENT . 'menu.php'; ?>
    <?php require_once COMPONENT . 'header.php'; ?>
    <table  color="gold" cellspacing="0" cellpadding="0" border="0" class="gapBetween table table-striped table-bordered">
            <tbody>
                <tr class="title">
                    <td width="80" class="titleOptions">ردیف</td>
                    <td class="titleOptions">عنوان</td>
                    <td class="titleOptions">اقدامات</td>
                </tr>
                <?php $i = 0; ?>
                <?php foreach ($data->form->result as $value) { 
                    $i++?>
                    <tr class="">
                        <td class="rowOptions counter"><?php echo $i ?></td>
                        <td class="rowOptions"><?php echo $value->title ?></td>
                        <td class="rowOptions d-flex">
                            <form method="POST" action="/sachadmin/field/destroy/<?php echo $value->id ?>/">
                                <button class="ml-1 btn btn-danger">حذف</button>
                            </form>
                            <a class="ml-1 manageActions" href="/sachadmin/field/edit/<?php echo $value->id ?>/">مدیریت</a>
                        </td>
                    </tr>
                <?php } ?>
                <?php if (count($data->form->result) == 0) { ?>
                    <?php echo '<tr style="text-align:center" colspan="20">موردی یافت نشد</tr>' ?>
                <?php } ?>
            </tbody>
        </table>
        <?php echo Template::adminNavigation($data->form->countAll, LIMIT); ?>
</div>
<?php require_once COMPONENT . 'footer.php'; ?>
