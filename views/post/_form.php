<?php

use app\models\PostCategory;
use dosamigos\ckeditor\CKEditor;
use kartik\select2\Select2;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Post */
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

<div class="post-form box box-primary">

    <div class="box-header">
        <h3 class="box-title">Form Post</h3>
    </div>
	<div class="box-body">

        <?= $form->errorSummary($model); ?>

        <?= $form->field($model, 'post_category_id')->widget(Select2::className(), [
            'data' => PostCategory::getList(),
            'pluginOptions' => ['allowClear' => true],
            'options' => [
                'placeholder' => 'Pilih Post Kategori',
            ]
        ]) ?>

        <?= $form->field($model, 'title')->textArea(['rows' => 5]) ?>

        <?= $form->field($model, 'content', [
            'horizontalCssClasses' => [
                'label' => 'col-sm-2',
                'wrapper' => 'col-sm-8',
                'error' => '',
                'hint' => '',
            ]
        ])->widget(CKEditor::className(), [
            'options' => ['rows' => 5],
            'preset' => 'advanced'
        ]) ?>

        <?= $form->field($model, 'thumbnail')->fileInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'tags')->textInput(['maxlength' => true]) ?>

        <?= Html::hiddenInput('referrer',$referrer); ?>

	</div>
    <div class="box-footer">
        <div class="col-sm-offset-2 col-sm-3">
            <?= Html::submitButton('<i class="fa fa-check"></i> Simpan',['class' => 'btn btn-success btn-flat']) ?>
        </div>
    </div>

</div>

<?php ActiveForm::end(); ?>
