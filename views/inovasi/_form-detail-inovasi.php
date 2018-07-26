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
