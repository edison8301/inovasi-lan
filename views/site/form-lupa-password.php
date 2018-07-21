<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

$this->title = 'Form Lupa Password';

$fieldOptions1 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-envelope form-control-feedback'></span>"
];
?>

<div class="login-box-style">
    <div class="login-logo" style="color: white">
        <b>Reset Password Form</b>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body" style="background: #79797978; color: white">
        <p class="login-box-msg" style="font-size: 25px"><strong>Lupa Password</strong></p>
        <p class="text-center">Masukan E-mail yang anda gunakan pada akun yang ada buat</p>

        <?php $form = ActiveForm::begin([
            'id' => 'login-form', 
            'enableClientValidation' => true
        ]); ?>

        <?= $form
            ->field($model, 'email', $fieldOptions1)
            ->label(false)
            ->textInput(['placeholder' => $model->getAttributeLabel('Alamat E-mail Pada Akun Anda')]) ?>

        <div class="row">
            <div class="col-sm-3">
            </div>

            <div class="col-sm-6">
                <?= Html::submitButton('Reset Password', ['class' => 'btn btn-primary btn-block btn-flat', 'name' => 'login-button']) ?>
            </div>

            <div class="col-sm-3">
            </div>
        </div>
        
        <?php ActiveForm::end(); ?>

    </div>
    <!-- /.login-box-body -->
</div><!-- /.login-box -->
