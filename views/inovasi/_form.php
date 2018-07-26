<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Tabs;
use dosamigos\ckeditor\CKEditor;
use kartik\select2\Select2;
use app\models\Kategori;
use app\models\JenisInovasi;
use app\models\KelompokInovator;
use app\models\StatusInovasi;
use app\models\TeknikValidasi;

/* @var $this yii\web\View */
/* @var $model app\models\Inovasi */
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

<div class="inovasi-form box box-primary">

    <div class="box-header">
        <h3 class="box-title">Form Inovasi</h3>
    </div>
	<div class="box-body">


        <?= $form->errorSummary($model); ?>

        <?= Tabs::widget([
                'items' => [
                    [
                        'label' => 'Keterangan Inovator',
                        'content' => $this->render('_form-keterangan-inovator', ['model' => $model, 'form' => $form]),
                        'active' => true
                    ],
                    [
                        'label' => 'Data Inovasi',
                        'content' => $this->render('_form-data-inovasi', ['model' => $model, 'form' => $form]),
                    ],
                    [
                        'label' => 'Detail Inovasi',
                        'content' => $this->render('_form-detail-inovasi', ['model' => $model, 'form' => $form]),
                    ],
                    [
                        'label' => 'Validasi Inovasi',
                        'content' => $this->render('_form-validasi-inovasi', ['model' => $model, 'form' => $form]),
                    ],
                ]
        ]); ?>

        <?= Html::hiddenInput('referrer',$referrer); ?>

	</div>
    <div class="box-footer">
        <div class="col-sm-offset-2 col-sm-3">
            <?= Html::submitButton('<i class="fa fa-check"></i> Simpan',['class' => 'btn btn-success btn-flat']) ?>
        </div>
    </div>

</div>

<?php ActiveForm::end(); ?>
