<?php
use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\User;
use app\models\UserRole;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

$this->title = 'Change Password';

?>

<div class="login-box-style">
    <div class="login-logo" style="color: white">
        <b></b>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body" style="background: #79797978; color: white">
        <p class="login-box-msg" style="font-size: 25px"><strong>Email telah kami kirim kan</strong></p>
        <p class="text-center"></p>

    


        <div class="row">
            <div class="col-sm-3">
            </div>

            <div class="col-sm-6">
                <?php //Html::submitButton('Reset My Password', ['class' => 'btn btn-primary btn-block btn-flat', 'name' => 'login-button']) ?>
            </div>

            <div class="col-sm-3">
            </div>
        </div>

    </div>
</div>