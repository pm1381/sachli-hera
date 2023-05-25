<?php

use App\Helpers\Tools;

?>

<div class="sidebar">
    <?php foreach (Tools::adminMenu() as $key => $value) { ?>
        <?php $roles = $data->form->currentAdmin->data->access ?>
        <?php if (in_array($value['role'], $roles)) { ?>
            <a href="<?php echo ADMIN_ORIGIN . $value['url']  ?>" class="sidebar-item" role="<?php echo $value['role'] ?>"><?php echo $value['title'] ?></a>
            <hr class="sidebar-item-seprator">
        <?php } ?>
    <?php } ?>
    <a href="<?php echo ADMIN_ORIGIN . '/logout/'  ?>" class="sidebar-item"><?php echo 'خروج' ?></a>
</div>