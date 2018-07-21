<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

$this->title = 'Set Password';

$fieldOptions2 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-lock form-control-feedback'></span>"
];
?>

<?php $form = ActiveForm::begin([            
    'id' => 'login-form',
]); ?>

<div class="login-box-style">
    <div class="login-logo" style="color: white">
        <b>KAJIAN</b><span>LAN</span>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body" style="background: #79797978; color: white">
        <p class="login-box-msg"><strong>Set Password</strong></p>

        <?= $form
            ->field($model, 'password', $fieldOptions2)
            ->label(false)
            ->passwordInput(['placeholder' => 'Password Baru']) ?>

        <?= $form
            ->field($model, 'password_konfirmasi', $fieldOptions2)
            ->label(false)
            ->passwordInput(['placeholder' => 'Password Baru Konfirmasi']) ?>

        <div class="row">
            <div class="col-xs-7">

            </div>

            <div class="col-xs-5">
                <?= Html::submitButton('<i class="fa fa-unlock"></i> Set Password', ['class' => 'btn btn-primary btn-block btn-flat', 'name' => 'login-button']) ?>
            </div>
        </div>

        
        <?php ActiveForm::end(); ?>

    </div>
    <!-- /.login-box-body -->
</div><!-- /.login-box -->
