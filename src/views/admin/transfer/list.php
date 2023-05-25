<?php

use App\Helpers\Arrays;
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
                <tr class="title">
                    <td width="40px" class="titleOptions">ردیف</td>
                    <td width="400px" class="titleOptions">از</td>
                    <td width="400px" class="titleOptions">به</td>
                    <td width="400px" class="titleOptions">کاربر</td>
                    <td width="400px" class="titleOptions">اطلاعات</td>
                </tr>
                <?php $i = 0; ?>
                <?php foreach ($data->form->result as $value) { 
                    $i++?>
                    <tr class="eachRow">
                        <td class="rowOptions counter"><?php echo $i ?></td>
                        <td class="rowOptions"><?php echo Tools::checkArray($value->from, Arrays::admins())['title']?></td>
                        <td class="rowOptions"><?php echo Tools::checkArray($value->to, Arrays::admins())['title'] ?></td>
                        <td class="rowOptions"><?php echo $value->userName . "<br>" . "-----" . "<br>" . $value->mobile ?></td>
                        <td class="rowOptions"><?php echo $value->fileName . "<br>" . "-----" . "<br>" . $value->categoryTitle ?></td>
                    </tr>
                <?php } ?>
                <?php if (count($data->form->result) == 0) { ?>
                    <?php echo '<tr style="text-align:center">موردی یافت نشد</tr>' ?>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<?php require_once COMPONENT . 'footer.php'; ?>
