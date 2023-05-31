<?php

use App\Helpers\Tools;

if (Tools::checkObject($data->form, "queryLog")) { ?>
    <?php if ($data->form->currentAdmin->data->isSuper) { ?>
        <div class="queryLog">
            <?php //dd($data->form); ?>
            <p>query count <?php echo $data->form->queryLog['basic']['count'] ?> --- query totalTime <?php echo $data->form->queryLog['basic']['totalTime'] ?> milli sconds</p>
        </div>
    <?php } ?>

    <div class="queryAllPage">
        <?php foreach ($data->form->queryLog['detail'] as $value) { ?>
            <div class="eachQuery">
                <p class="query"><?php echo $value['query'] ?></p>
                <p class="time">time spent = <?php echo $value['time'] ?> ms</p>
            </div>
        <?php } ?>
    </div>
<?php } ?>
