<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\select2\Select2;
use app\models\Role;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<?php $form = ActiveForm::begin([
    'layout'=>'horizontal',
    'enableAjaxValidation'=>false,
    'enableClientValidation'=>false,
    'fieldConfig' => [
        'horizontalCssClasses' => [
            'label' => 'col-sm-2',
            'wrapper' => 'col-sm-4',
            'error' => '',
            'hint' => '',
        ],
    ]
]); ?>

<div class="user-form box box-primary">

    <div class="box-header">
        <h3 class="box-title">Form User</h3>
    </div>
	<div class="box-body">

        <?= $form->errorSummary($model); ?>

        <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

        <?php if($model->isNewRecord) { ?>
            
        <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>
        
        <?php } ?>

        <?= $form->field($model, 'role_id')->widget(Select2::className(), [
            'data' => Role::getList(),
            'pluginOptions' => ['allowClear' => true],
            'options' => [
                'placeholder' => 'Pilih Kelompok Inovator',
            ]
        ]) ?>

        <?= Html::hiddenInput('referrer',$referrer); ?>

	</div>
    <div class="box-footer">
        <div class="col-sm-offset-2 col-sm-3">
            <?= Html::submitButton('<i class="fa fa-check"></i> Simpan',['class' => 'btn btn-success btn-flat']) ?>
        </div>
    </div>

</div>

<?php ActiveForm::end(); ?>
