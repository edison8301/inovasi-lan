<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Member */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="member-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alamat')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'telepon')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_instansi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alamat_instansi')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'telepon_instansi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'login_terakhir')->textInput() ?>

    <?= $form->field($model, 'aktif')->textInput() ?>

    <?= $form->field($model, 'waktu_dibuat')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
