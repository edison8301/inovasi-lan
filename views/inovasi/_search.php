<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\InovasiSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="inovasi-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'kategori_id') ?>

    <?= $form->field($model, 'jenis_inovasi_id') ?>

    <?= $form->field($model, 'nama_inovasi') ?>

    <?= $form->field($model, 'produk_inovasi') ?>

    <?php // echo $form->field($model, 'penggagas') ?>

    <?php // echo $form->field($model, 'kelompok_inovator_id') ?>

    <?php // echo $form->field($model, 'deskripsi') ?>

    <?php // echo $form->field($model, 'nama_instansi') ?>

    <?php // echo $form->field($model, 'unit_instansi') ?>

    <?php // echo $form->field($model, 'tahun_inisiasi') ?>

    <?php // echo $form->field($model, 'tahun_implementasi') ?>

    <?php // echo $form->field($model, 'faktor_pendorong') ?>

    <?php // echo $form->field($model, 'faktor_penghambat') ?>

    <?php // echo $form->field($model, 'tahapan_proses') ?>

    <?php // echo $form->field($model, 'output') ?>

    <?php // echo $form->field($model, 'outcome') ?>

    <?php // echo $form->field($model, 'manfaat') ?>

    <?php // echo $form->field($model, 'prasyarat_replikasi') ?>

    <?php // echo $form->field($model, 'kontak') ?>

    <?php // echo $form->field($model, 'sumber') ?>

    <?php // echo $form->field($model, 'teknik_validasi_id') ?>

    <?php // echo $form->field($model, 'status_inovasi_id') ?>

    <?php // echo $form->field($model, 'gambar_ilustrasi') ?>

    <?php // echo $form->field($model, 'jumlah_dilihat') ?>

    <?php // echo $form->field($model, 'jumlah_diunduh') ?>

    <?php // echo $form->field($model, 'tanggal_inovasi') ?>

    <?php // echo $form->field($model, 'member_id') ?>

    <?php // echo $form->field($model, 'waktu_dibuat') ?>

    <?php // echo $form->field($model, 'waktu_diterbitkan') ?>

    <?php // echo $form->field($model, 'waktu_diubah') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
