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

<div>&nbsp;</div>

<?= $form->field($model, 'kelompok_inovator_id')->widget(select2::className(), [
    'data' => KelompokInovator::getList(),
    'pluginOptions' => ['allowClear' => true],
    'options' => [
        'placeholder' => 'Pilih Kelompok Inovator',
    ]
]) ?>

<?= $form->field($model, 'nama_instansi')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'unit_instansi')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'tahun_inisiasi')->textInput() ?>

<?= $form->field($model, 'tahun_implementasi')->textInput() ?>