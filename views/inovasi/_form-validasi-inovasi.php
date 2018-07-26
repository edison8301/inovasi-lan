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



        <?= $form->field($model, 'kategori_id')->widget(Select2::className(), [
            'data' => Kategori::getList(),
            'pluginOptions' => ['allowClear' => true],
            'options' => [
                'placeholder' => 'Pilih Kategori',
            ]
        ]) ?>

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

        <?= $form->field($model, 'kelompok_inovator_id')->widget(select2::className(), [
            'data' => KelompokInovator::getList(),
            'pluginOptions' => ['allowClear' => true],
            'options' => [
                'placeholder' => 'Pilih Kelompok Inovator',
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

        <?= $form->field($model, 'nama_instansi')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'unit_instansi')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'tahun_inisiasi')->textInput() ?>

        <?= $form->field($model, 'tahun_implementasi')->textInput() ?>

        <?= $form->field($model, 'faktor_pendorong', [
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

        <?= $form->field($model, 'faktor_penghambat', [
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

        <?= $form->field($model, 'tahapan_proses', [
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

        <?= $form->field($model, 'output', [
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


        <?= $form->field($model, 'outcome', [
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

        <?= $form->field($model, 'manfaat', [
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

        <?= $form->field($model, 'prasyarat_replikasi', [
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

        <?= $form->field($model, 'kontak')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'sumber')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'teknik_validasi_id')->widget(select2::className(), [
            'data' => TeknikValidasi::getList(),
            'pluginOptions' => ['allowClear' => true],
            'options' => [
                'placeholder' => 'Pilih Status Inovasi',
            ]
        ]) ?>

        <?= $form->field($model, 'status_inovasi_id')->widget(select2::className(), [
            'data' => StatusInovasi::getList(),
            'pluginOptions' => ['allowClear' => true],
            'options' => [
                'placeholder' => 'Pilih Status Inovasi',
            ]
        ]) ?>

        <?= $form->field($model, 'gambar_ilustrasi')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'tanggal_inovasi')->textInput() ?>

        <?= $form->field($model, 'member_id')->textInput() ?>

