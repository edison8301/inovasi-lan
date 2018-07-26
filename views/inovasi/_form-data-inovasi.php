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

        <?= $form->field($model, 'jenis_inovasi_id')->widget(Select2::className(), [
            'data' => JenisInovasi::getList(),
            'pluginOptions' => ['allowClear' => true],
            'options' => [
                'placeholder' => 'Pilih Kategori',
            ]
        ]) ?>

        <?= $form->field($model, 'nama_inovasi')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'produk_inovasi')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'penggagas')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'kontak')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'sumber')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'teknik_validasi_id')->widget(select2::className(), [
            'data' => TeknikValidasi::getList(),
            'pluginOptions' => ['allowClear' => true],
            'options' => [
                'placeholder' => 'Pilih Status Inovasi',
            ]
        ]) ?>

        <?= $form->field($model, 'deskripsi', [
            'horizontalCssClasses' => [
                'label' => 'col-sm-2',
                'wrapper' => 'col-sm-8',
                'error' => '',
                'hint' => '',
            ]
        ])->widget(CKEditor::className(), [
            'options' => ['rows' => 3],
            'preset' => 'advanced'
        ]) ?>


        <?= $form->field($model, 'gambar_ilustrasi')->textInput(['maxlength' => true]) ?>




