<?php
use App\Classes\Session;
?>

<?php require_once COMPONENT . 'top.php'; ?>

<form method="post" action=".">
    <div class="card">
        <article class="card-body">
            <?php $session = new Session();?>
            <p class="text-danger text-center"><?php echo $session->getFlash('error') ?></p>
            <p class="text-warning text-center"><?php echo $session->getFlash('warning') ?></p>
            <p class="text-success text-center"><?php echo $session->getFlash('success') ?></p>
            <form>
            <div class="form-group ">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                </div>
                <input name="mobile" class="form-control" placeholder="شماره موبایل" type="mobile" >
            </div>
            </div>
            <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                </div>
                <input name="password" class="form-control" placeholder="رمزعبور" type="password">
            </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block"> ورود  </button>
            </div>
            </form>
        </article>
    </div>
</div>
</div>
</form>
