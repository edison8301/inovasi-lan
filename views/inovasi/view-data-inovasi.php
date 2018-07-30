<?php 
use yii\helpers\Html;
use yii\widgets\DetailView;
use app\components\Helper;
?>

	<?= DetailView::widget([
        'model' => $model,
        'template' => '<tr><th width="180px" style="text-align:right">{label}</th><td>{value}</td></tr>',
        'attributes' => [
            [
                'attribute' => 'jenis_inovasi_id',
                'format' => 'raw',
                'value' => @$model->jenisInovasi->nama,
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
                'value' => @$model->teknikValidasi->nama,
            ],
            [
                'attribute' => 'tanggal_inovasi',
                'format' => 'raw',
                'value' => Helper::getTanggal($model->tanggal_inovasi),
            ],
            [
                'attribute' => 'deskripsi',
                'format' => 'raw',
                'value' => $model->deskripsi,
            ],
            [
                'attribute' => 'gambar_ilustrasi',
                'format' => 'raw',
                'value' => $model->getGambar(['class' => 'img-responsive','style' => 'width:200px']),
            ],
        ],
    ]) ?>