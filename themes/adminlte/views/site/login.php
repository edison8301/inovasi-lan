<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

$this->title = 'Sign In';

$fieldOptions1 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-envelope form-control-feedback'></span>"
];

$fieldOptions2 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-lock form-control-feedback'></span>"
];
?>

<div class="login-box-style">
    <div class="login-logo" style="color: white">
        <b>SISTEM INFORMASI KAJIAN</b><span>LAN</span>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body" style="background: #79797978; color: white">
        <p class="login-box-msg"><strong>Login</strong></p>

        <?php $form = ActiveForm::begin(['id' => 'login-form', 'enableClientValidation' => false]); ?>

        <?= $form
            ->field($model, 'username', $fieldOptions1)
            ->label(false)
            ->textInput(['placeholder' => $model->getAttributeLabel('username')]) ?>

        <?= $form
            ->field($model, 'password', $fieldOptions2)
            ->label(false)
            ->passwordInput(['placeholder' => $model->getAttributeLabel('password')]) ?>

        <div class="row">
            <div class="col-xs-8">
                <?= $form->field($model, 'rememberMe')->checkbox()->label('Ingat Saya') ?>
            </div>

            <div class="col-xs-4">
                <?= Html::submitButton('Login', ['class' => 'btn btn-primary btn-block btn-flat', 'name' => 'login-button']) ?>
            </div>
        </div>

        <div class="social-auth-links text-center">
            <p>- OR -</p>
            <?= Html::a('<i class="fa fa-unlock"></i> Lupa Password', ['site/lupa-password'], ['class' => 'btn btn-block btn-social btn-google btn-flat']); ?>
            <?= Html::a('<i class="fa fa-user-plus"></i> Registrasi', ['site/pendaftaran'], ['class' => 'btn btn-block btn-social btn-facebook btn-flat']); ?>
        </div>

        <?= Html::a('Home', ['site/index'], ['style' => 'color:white']); ?>

        
        <?php ActiveForm::end(); ?>

    </div>
    <!-- /.login-box-body -->
</div><!-- /.login-box -->