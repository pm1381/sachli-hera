<?php

use App\Classes\Session;
use App\Helpers\Tools;

// print_f($_SESSION) ?>

<?php require_once COMPONENT . 'top.php'; ?>
<div class="main">
    <h3 class="manageTitle">home page</h3>
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
                <td class="rowOptions">آپلود عکس نمونه کار</td>
                <td class="rowOptions">
                <?php for ($i=1; $i <= 6 ; $i++) {  ?>
                        <form id="upload_form" enctype="multipart/form-data" method="post">
                            <input type="file" name="file_home" id="file_home" data-name="sample" data-number="<?php echo $i ?>" class="imageUpload" onchange="homeuploadFile.call(this, <?php echo $i ?>)"><br>
                            <progress id="progressBar" value="0" max="100" style="width:300px;"></progress>
                            <p id="status"></p>
                            <p id="loaded_n_total"></p>
                            <?php if (file_exists(UPLOAD . "home/sample/" . "image_" . $i . ".jpeg")) { ?>
                                <a class="showpic" href="<?php echo ORIGIN . 'public/upload/home/sample/' . "image_" . $i . ".jpeg" ?>" target="__blank">مشاهده عکس</a>
                            <?php } ?>
                        </form>
                <?php } ?>
                </td>
            </tr>
            <tr>
                <td class="rowOptions">آپلود عکس آغاز صفحه</td>
                <td class="rowOptions">
                <?php for ($i=1; $i <= 6 ; $i++) {  ?>
                        <form id="upload_form" enctype="multipart/form-data" method="post">
                            <input type="file" name="file_home" id="file_home" data-name="hero" data-number="<?php echo $i ?>" class="imageUpload" onchange="homeuploadFile.call(this, <?php echo $i ?>)"><br>
                            <progress id="progressBar" value="0" max="100" style="width:300px;"></progress>
                            <p id="status"></p>
                            <p id="loaded_n_total"></p>
                            <?php if (file_exists(UPLOAD . "home/hero/" . "image_" . $i . ".jpeg")) { ?>
                                <a class="showpic" href="<?php echo ORIGIN . 'public/upload/home/hero/' . "image_" . $i . ".jpeg" ?>" target="__blank">مشاهده عکس</a>
                            <?php } ?>
                        </form>
                <?php } ?>
                </td>
            </tr>
            <tr>
                <td class="rowOptions">آپلود فیلم</td>
                <td class="rowOptions"></td>
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
