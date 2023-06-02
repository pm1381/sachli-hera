<?php

use App\Classes\Session;
use App\Helpers\Tools;

// print_f($_SESSION) ?>

<?php require_once COMPONENT . 'top.php'; ?>
<div class="main">
    <h3 class="manageTitle">مدیریت  صفحات ثابت</h3>
    <?php $session = new Session();
    $error = $session->getFlash('error'); ?>
    <?php if ($error != "") { ?>
        <p class="bg-danger text-center session gapBetween"><?php echo $error ?></p>
    <?php } ?>
    <table cellspacing="0" cellpadding="0" border="0" class="mt-2 gapBetween table table-striped table-bordered">
        <trbody>
            <?php $v = Tools::checkObject($data, 'form');
                if ($v != "") {
                    $value = Tools::checkObject($v, 'result');
                } else {
                    $value = new stdClass();
                }
            ?>
            <tr>
                <td class="rowOptions">آپلود عکس اصلی</td>
                <td class="rowOptions">
                    <form id="upload_form" enctype="multipart/form-data" method="post">
                        <input type="file" name="file_main" id="file_main" data-main="1" data-number="1" data-id="<?php echo $value->id ?>" class="imageUpload" onchange="uploadFile.call(this, <?php echo $value->id ?>)"><br>
                        <progress id="progressBar" value="0" max="100" style="width:300px;"></progress>
                        <p id="status"></p>
                        <p id="loaded_n_total"></p>
                        <?php if (file_exists(UPLOAD . "landing/" . "main" . "_" . $value->id . "_" . '1' . ".jpeg")) { ?>
                            <a class="showpic" href="<?php echo ORIGIN . 'public/upload/landing/main_' . $value->id . "_" . '1' . ".jpeg" ?>" target="__blank">مشاهده عکس</a>
                        <?php } ?>
                    </form>
                </td>
            </tr>
            <tr>
                <td class="rowOptions">آپلود عکس نمونه کار</td>
                <td class="rowOptions">
                <?php for ($i=1; $i <= 6 ; $i++) {  ?>
                        <form id="upload_form" enctype="multipart/form-data" method="post">
                            <input type="file" name="file_main" id="file_main" data-main="0" data-number="<?php echo $i ?>" data-id="<?php echo $value->id ?>" class="imageUpload" onchange="uploadFile.call(this, <?php echo $value->id ?>)"><br>
                            <progress id="progressBar" value="0" max="100" style="width:300px;"></progress>
                            <p id="status"></p>
                            <p id="loaded_n_total"></p>
                            <?php if (file_exists(UPLOAD . "landing/" . "support" . "_" . $value->id . "_" . $i . ".jpeg")) { ?>
                                <a class="showpic" href="<?php echo ORIGIN . 'public/upload/landing/support_' . $value->id . "_" . $i . ".jpeg" ?>" target="__blank">مشاهده عکس</a>
                            <?php } ?>
                        </form>
                <?php } ?>
                </td>
            </tr>
        </trbody>
    </table>
        <form method="POST" action="<?php echo $data->form->actionUrl ?>">
            <div class="d-flex align-items-center justify-content-center">
                <input type="submit" value="ثبت و ارسال" class="manageFormSubmit gapBetween btn btn-light w-50">
            </div>
        </form>
</div>
<?php require_once COMPONENT . 'footer.php'; ?>
