<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\tabs\TabsX;

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
                    'attribute' => 'tahun_inisiasi',
                    'format' => 'raw',
                    'value' => $model->tahun_inisiasi,
                ],
                [
                    'attribute' => 'tahun_implementasi',
                    'format' => 'raw',
                    'value' => $model->tahun_implementasi,
                ],
            ],
        ]) ?>

        <hr>

        <?= DetailView::widget([
            'model' => $model,
            'template' => '<tr><th width="200px" style="text-align:left">{label}</th><td>{value}</td></tr>',
            'attributes' => [
                [
                    'attribute' => 'deskripsi',
                    'format' => 'raw',
                    'value' => $model->deskripsi,
                ],
            ],
        ]) ?>

        <?= $this->render('/site/tabs-inovasi',[
            'model' => $model
        ]) ?>

    </div>

    <div class="box-footer">
        <?= Html::a('<i class="fa fa-pencil"></i> Sunting Inovasi', ['update', 'id' => $model->id], ['class' => 'btn btn-success btn-flat']) ?>
        <?= Html::a('<i class="fa fa-list"></i> Daftar Inovasi', ['index'], ['class' => 'btn btn-warning btn-flat']) ?>
    </div>

</div>
