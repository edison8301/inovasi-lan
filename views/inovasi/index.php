<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\JenisInovasi;
use app\models\KelompokInovator;
use app\models\StatusInovasi;

/* @var $this yii\web\View */
/* @var $searchModel app\models\InovasiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Daftar Inovasi';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inovasi-index box box-primary">

    <div class="box-header">
        <?= Html::a('<i class="fa fa-plus"></i> Tambah Inovasi', ['create'], ['class' => 'btn btn-success btn-flat']) ?>
        <?= Html::a('<i class="fa fa-print"></i> Export Excel Inovasi', Yii::$app->request->url.'&export=1', ['class' => 'btn btn-success btn-flat']) ?>

    </div>

    <div class="box-body table-responsive">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'class' => 'yii\grid\SerialColumn',
                'header' => 'No',
                'headerOptions' => ['style' => 'text-align:center'],
                'contentOptions' => ['style' => 'text-align:center']
            ],
            [
                'attribute' => 'nama_inovasi',
                'format' => 'raw',
                'headerOptions' => ['style' => 'text-align:center;'],
                'contentOptions' => ['style' => 'text-align:left;'],
            ],
            [
                'attribute' => 'kelompok_inovator_id',
                'format' => 'raw',
                'value'=>function($data) {
                    return @$data->kelompokInovator->nama;
                },
                'filter'=>kelompokInovator::getList(),
                'headerOptions' => ['style' => 'text-align:center; width: 200px'],
                'contentOptions' => ['style' => 'text-align:center;'],
            ],
            [
                'attribute' => 'jenis_inovasi_id',
                'format' => 'raw',
                'value'=>function($data) {
                    return $data->jenisInovasi->nama;
                },
                'filter'=>JenisInovasi::getList(),
                'headerOptions' => ['style' => 'text-align:center; width: 200px'],
                'contentOptions' => ['style' => 'text-align:center;'],
            ],
            [
                'attribute' => 'status_inovasi_id',
                'format' => 'raw',
                'value'=>function($data) {
                    return @$data->statusInovasi->nama;
                },
                'filter'=>StatusInovasi::getList(),
                'headerOptions' => ['style' => 'text-align:center;'],
                'contentOptions' => ['style' => 'text-align:center;'],
            ],
            [
                'attribute' => 'waktu_dibuat',
                'format' => 'raw',
                'headerOptions' => ['style' => 'text-align:center;'],
                'contentOptions' => ['style' => 'text-align:center;'],
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'contentOptions' => ['style' => 'text-align:center;width:80px']
            ],
        ],
    ]); ?>
    </div>
</div>
