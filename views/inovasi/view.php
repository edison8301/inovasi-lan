<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Inovasi */

$this->title = "Detail Inovasi";
$this->params['breadcrumbs'][] = ['label' => 'Inovasi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inovasi-view box box-primary">

    <div class="box-header">
        <h3 class="box-title">Detail Inovasi</h3>
    </div>

    <div class="box-body">

    <?= DetailView::widget([
        'model' => $model,
        'template' => '<tr><th width="180px" style="text-align:right">{label}</th><td>{value}</td></tr>',
        'attributes' => [
            [
                'attribute' => 'id',
                'format' => 'raw',
                'value' => $model->id,
            ],
            [
                'attribute' => 'kategori_id',
                'format' => 'raw',
                'value' => $model->kategori_id,
            ],
            [
                'attribute' => 'jenis_inovasi_id',
                'format' => 'raw',
                'value' => $model->jenis_inovasi_id,
            ],
            [
                'attribute' => 'nama_inovasi',
                'format' => 'raw',
                'value' => $model->nama_inovasi,
            ],
            [
                'attribute' => 'produk_inovasi',
                'format' => 'raw',
                'value' => $model->produk_inovasi,
            ],
            [
                'attribute' => 'penggagas',
                'format' => 'raw',
                'value' => $model->penggagas,
            ],
            [
                'attribute' => 'kelompok_inovator_id',
                'format' => 'raw',
                'value' => $model->kelompok_inovator_id,
            ],
            [
                'attribute' => 'deskripsi',
                'format' => 'raw',
                'value' => $model->deskripsi,
            ],
            [
                'attribute' => 'nama_instansi',
                'format' => 'raw',
                'value' => $model->nama_instansi,
            ],
            [
                'attribute' => 'unit_instansi',
                'format' => 'raw',
                'value' => $model->unit_instansi,
            ],
            [
                'attribute' => 'tahun_inisiasi',
                'format' => 'raw',
                'value' => $model->tahun_inisiasi,
            ],
            [
                'attribute' => 'tahun_implementasi',
                'format' => 'raw',
                'value' => $model->tahun_implementasi,
            ],
            [
                'attribute' => 'faktor_pendorong',
                'format' => 'raw',
                'value' => $model->faktor_pendorong,
            ],
            [
                'attribute' => 'faktor_penghambat',
                'format' => 'raw',
                'value' => $model->faktor_penghambat,
            ],
            [
                'attribute' => 'tahapan_proses',
                'format' => 'raw',
                'value' => $model->tahapan_proses,
            ],
            [
                'attribute' => 'output',
                'format' => 'raw',
                'value' => $model->output,
            ],
            [
                'attribute' => 'outcome',
                'format' => 'raw',
                'value' => $model->outcome,
            ],
            [
                'attribute' => 'manfaat',
                'format' => 'raw',
                'value' => $model->manfaat,
            ],
            [
                'attribute' => 'prasyarat_replikasi',
                'format' => 'raw',
                'value' => $model->prasyarat_replikasi,
            ],
            [
                'attribute' => 'kontak',
                'format' => 'raw',
                'value' => $model->kontak,
            ],
            [
                'attribute' => 'sumber',
                'format' => 'raw',
                'value' => $model->sumber,
            ],
            [
                'attribute' => 'teknik_validasi_id',
                'format' => 'raw',
                'value' => $model->teknik_validasi_id,
            ],
            [
                'attribute' => 'status_inovasi_id',
                'format' => 'raw',
                'value' => $model->status_inovasi_id,
            ],
            [
                'attribute' => 'gambar_ilustrasi',
                'format' => 'raw',
                'value' => $model->gambar_ilustrasi,
            ],
            [
                'attribute' => 'jumlah_dilihat',
                'format' => 'raw',
                'value' => $model->jumlah_dilihat,
            ],
            [
                'attribute' => 'jumlah_diunduh',
                'format' => 'raw',
                'value' => $model->jumlah_diunduh,
            ],
            [
                'attribute' => 'tanggal_inovasi',
                'format' => 'raw',
                'value' => $model->tanggal_inovasi,
            ],
            [
                'attribute' => 'member_id',
                'format' => 'raw',
                'value' => $model->member_id,
            ],
            [
                'attribute' => 'waktu_dibuat',
                'format' => 'raw',
                'value' => $model->waktu_dibuat,
            ],
            [
                'attribute' => 'waktu_diterbitkan',
                'format' => 'raw',
                'value' => $model->waktu_diterbitkan,
            ],
            [
                'attribute' => 'waktu_diubah',
                'format' => 'raw',
                'value' => $model->waktu_diubah,
            ],
        ],
    ]) ?>

    </div>

    <div class="box-footer">
        <?= Html::a('<i class="fa fa-pencil"></i> Sunting Inovasi', ['update', 'id' => $model->id], ['class' => 'btn btn-success btn-flat']) ?>
        <?= Html::a('<i class="fa fa-list"></i> Daftar Inovasi', ['index'], ['class' => 'btn btn-warning btn-flat']) ?>
    </div>

</div>
