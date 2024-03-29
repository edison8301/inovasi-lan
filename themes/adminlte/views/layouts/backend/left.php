<?php

use app\models\User;
use app\models\PenelitianJenis;
use app\models\UserRole;
use app\models\Pegawai;
use app\models\Anggota;
use app\models\PenelitianUnduh;
use app\models\Penelitian;
use app\models\Unit;

?>

<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= Yii::getAlias('@web').'/images/logo.png'; ?>" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p><?= ucwords(Yii::$app->user->identity->username) ?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form> 
        <!-- /.search form -->
        <?php //if (User::isAdmin()) { ?>
            <?= $this->render('_menu-admin'); ?>
        <?php //} ?>

    </section>

</aside>
