<?php

use app\components\Helper;
use kartik\tabs\TabsX;
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

        <?php /*<?php $items = [
            [
                'label' => 'Keterangan Inovator',
                'content' => $this->render('view-keterangan-inovator',['model' => $model]),
                'active' => true
            ],
            [
                'label' => 'Data Inovasi',
                'content' => $this->render('view-data-inovasi',['model' => $model])
            ],
            [
                'label' => 'Detail Inovasi',
                'content' => $this->render('view-detail-inovasi',['model' => $model])
            ],
        ] ?>

        <?= TabsX::widget([
            'items' => $items,
            'position' => TabsX::POS_ABOVE,
            'encodeLabels' => false
        ]); ?>*/ ?>

        <div class="col-sm-6">
            <?= DetailView::widget([
                'model' => $model,
                'template' => '<tr><th width="200px" style="text-align:left">{label}</th><td>{value}</td></tr>',
                'attributes' => [
                    [
                        'attribute' => 'nama_inovasi',
                        'format' => 'raw',
                        'value' => $model->nama_inovasi,
                    ],
                    [
                        'attribute' => 'jenis_inovasi_id',
                        'format' => 'raw',
                        'value' => @$model->jenisInovasi->nama,
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
                        'attribute' => 'kelompok_inovator_id',
                        'format' => 'raw',
                        'value' => @$model->kelompokInovator->nama,
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
                ],
            ]) ?>
        </div>

        <div class="col-sm-6">
            <?= DetailView::widget([
                'model' => $model,
                'template' => '<tr><th width="200px" style="text-align:left">{label}</th><td>{value}</td></tr>',
                'attributes' => [
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
                        'attribute' => 'provinsi_id',
                        'format' => 'raw',
                        'value' => @$model->provinsi->nama,
                    ],
                    [
                        'attribute' => 'kabkota_id',
                        'format' => 'raw',
                        'value' => @$model->kabkota->nama,
                    ],
                    [
                        'attribute' => 'teknik_validasi_id',
                        'format' => 'raw',
                        'value' => @$model->teknikValidasi->nama,
                    ],
                    [
                        'attribute' => 'waktu_dibuat',
                        'format' => 'raw',
                        'value' => Helper::getWaktuWIB($model->waktu_dibuat),
                    ],
                    [
                        'attribute' => 'waktu_diterbitkan',
                        'format' => 'raw',
                        'value' => Helper::getWaktuWIB($model->waktu_diterbitkan),
                    ],
                    [
                        'attribute' => 'waktu_diubah',
                        'format' => 'raw',
                        'value' => Helper::getWaktuWIB($model->waktu_diubah),
                    ],
                    [
                        'attribute' => 'jumlah_dilihat',
                        'format' => 'raw',
                        'value' => $model->jumlah_dilihat,
                    ],
                ],
            ]) ?>
        </div>

        <div class="col-sm-12">
            <?= DetailView::widget([
                'model' => $model,
                'template' => '<tr><th width="200px" style="text-align:left">{label}</th><td>{value}</td></tr>',
                'attributes' => [
                    [
                        'attribute' => 'gambar_ilustrasi',
                        'format' => 'raw',
                        'value' => $model->getGambar(['style' => 'width:150px']),
                    ],
                    [
                        'attribute' => 'deskripsi',
                        'format' => 'raw',
                        'value' => $model->deskripsi,
                    ],
                    [
                        'attribute' => 'status_inovasi',
                        'format' => 'raw',
                        'value' => @$model->statusInovasi->nama,
                    ],
                ],
            ]) ?>

            <?= $this->render('/site/tabs-inovasi',[
                'model' => $model
            ]) ?>
            
        </div>

    </div>

    <div class="box-footer">
        <?= Html::a('<i class="fa fa-pencil"></i> Sunting Inovasi', ['update', 'id' => $model->id], ['class' => 'btn btn-success btn-flat']) ?>
        <?= Html::a('<i class="fa fa-list"></i> Daftar Inovasi', ['index'], ['class' => 'btn btn-warning btn-flat']) ?>
    </div>

</div>
