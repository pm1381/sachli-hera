<?php

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
                            <input name="title" class="manageInput" value="<?php echo Tools::checkObject($value, 'title') ?>">
                            <span class="manageSpan">عنوان</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="rowOptions">
                            <input name="description" class="manageInput" value="<?php echo Tools::checkObject($value, 'description') ?>">
                            <span class="manageSpan">توضیحات</span>
                        </td>
                    </tr>
                </trbody>
            </table>
            <input type="submit" value="ثبت و ارسال" class="manageFormSubmit btn btn-info w-100">
        </form>
    </div>
</div>
<?php require_once COMPONENT . 'footer.php'; ?>
