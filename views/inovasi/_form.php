<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

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

        <?= $form->field($model, 'kategori_id')->textInput() ?>

        <?= $form->field($model, 'jenis_inovasi_id')->textInput() ?>

        <?= $form->field($model, 'nama_inovasi')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'produk_inovasi')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'penggagas')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'kelompok_inovator_id')->textInput() ?>

        <?= $form->field($model, 'deskripsi')->textarea(['rows' => 6]) ?>

        <?= $form->field($model, 'nama_instansi')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'unit_instansi')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'tahun_inisiasi')->textInput() ?>

        <?= $form->field($model, 'tahun_implementasi')->textInput() ?>

        <?= $form->field($model, 'faktor_pendorong')->textarea(['rows' => 6]) ?>

        <?= $form->field($model, 'faktor_penghambat')->textarea(['rows' => 6]) ?>

        <?= $form->field($model, 'tahapan_proses')->textarea(['rows' => 6]) ?>

        <?= $form->field($model, 'output')->textarea(['rows' => 6]) ?>

        <?= $form->field($model, 'outcome')->textarea(['rows' => 6]) ?>

        <?= $form->field($model, 'manfaat')->textarea(['rows' => 6]) ?>

        <?= $form->field($model, 'prasyarat_replikasi')->textarea(['rows' => 6]) ?>

        <?= $form->field($model, 'kontak')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'sumber')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'teknik_validasi_id')->textInput() ?>

        <?= $form->field($model, 'status_inovasi_id')->textInput() ?>

        <?= $form->field($model, 'gambar_ilustrasi')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'jumlah_dilihat')->textInput() ?>

        <?= $form->field($model, 'jumlah_diunduh')->textInput() ?>

        <?= $form->field($model, 'tanggal_inovasi')->textInput() ?>

        <?= $form->field($model, 'member_id')->textInput() ?>

        <?= $form->field($model, 'waktu_dibuat')->textInput() ?>

        <?= $form->field($model, 'waktu_diterbitkan')->textInput() ?>

        <?= $form->field($model, 'waktu_diubah')->textInput() ?>

        <?= Html::hiddenInput('referrer',$referrer); ?>

	</div>
    <div class="box-footer">
        <div class="col-sm-offset-2 col-sm-3">
            <?= Html::submitButton('<i class="fa fa-check"></i> Simpan',['class' => 'btn btn-success btn-flat']) ?>
        </div>
    </div>

</div>

<?php ActiveForm::end(); ?>
