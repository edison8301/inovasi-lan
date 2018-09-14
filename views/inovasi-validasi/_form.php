<?php

use app\models\Inovasi;
use app\models\InovasiValidasi;
use app\models\Validasi;
use kartik\select2\Select2;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\InovasiValidasi */
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

<div class="inovasi-validasi-form box box-primary">

    <div class="box-header">
        <h3 class="box-title">Form Inovasi Validasi</h3>
    </div>
	<div class="box-body">

        <?= $form->errorSummary($model); ?>

        <?= $form->field($model, 'inovasi_id')->widget(Select2::className(), [
            'data' => Inovasi::getList(),
            'pluginOptions' => ['allowClear' => true],
            'options' => [
                'placeholder' => 'Pilih Inovasi',
            ]
        ]) ?>

        <?= $form->field($model, 'validasi_id')->widget(Select2::className(), [
            'data' => Validasi::getList(),
            'pluginOptions' => ['allowClear' => true],
            'options' => [
                'placeholder' => 'Pilih Validasi',
            ]
        ]) ?>

        <?= $form->field($model, 'aktif')->dropDownList(InovasiValidasi::getListStatus(), ['option' => 'value']); ?>

        <?= Html::hiddenInput('referrer',$referrer); ?>

	</div>
    <div class="box-footer">
        <div class="col-sm-offset-2 col-sm-3">
            <?= Html::submitButton('<i class="fa fa-check"></i> Simpan',['class' => 'btn btn-success btn-flat']) ?>
        </div>
    </div>

</div>

<?php ActiveForm::end(); ?>
