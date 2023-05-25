<!DOCTYPE html>
<html lang="en">
<head>
    <?php $v = "?v=" . 0.3 ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="format-detection" content="telephone=no">
    <title><?php echo $data->basic->title ?></title>

    <script src="<?php echo ORIGIN . 'public/asset/js/jquery-3.6.3.min.js' ?>" crossORIGIN="anonymous"></script>
    <!-- <script src="<?php echo ORIGIN . 'public/asset/js/jquery-3.6.0.js' ?>" crossORIGIN="anonymous"></script> -->
    <script src="<?php echo ORIGIN . 'public/asset/js/sweetalert2@11.js' ?>"></script>
    <script src="<?php echo ORIGIN . 'public/asset/js/popper.min.js' ?>"></script>
    <script src="<?php echo ORIGIN . 'public/asset/js/bootstrap.bundle.min.js' ?>"></script>
    <link rel="stylesheet" href="<?php echo ORIGIN . "public/asset/css/bootstrap.min.css?v=4.6" ?>">
    <link rel="stylesheet" href="<?php echo ORIGIN . "public/asset/css/admin/style.css" . $v ?>">
    <link rel="stylesheet" href="<?php echo ORIGIN . "public/asset/css/admin/media.css" . $v ?>">
    <script>
        const adminAddress = <?php echo "'" . ADMIN_ORIGIN . "'" ?>;
    </script>
    <script src="<?php echo ORIGIN . 'public/asset/js/admin/action.js' . $v ?>"></script>
    <script src="<?php echo ORIGIN . 'public/asset/js/admin/function.js' . $v ?>"></script>
</head>

<body>

<?php require_once VIEW . 'admin/popups/loading.php' ?>
