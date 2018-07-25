<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\InovasiValidasi */

$this->title = "Detail Inovasi Validasi";
$this->params['breadcrumbs'][] = ['label' => 'Inovasi Validasi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inovasi-validasi-view box box-primary">

    <div class="box-header">
        <h3 class="box-title">Detail Inovasi Validasi</h3>
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
                'attribute' => 'inovasi_id',
                'format' => 'raw',
                'value' => $model->inovasi_id,
            ],
            [
                'attribute' => 'validasi_id',
                'format' => 'raw',
                'value' => $model->validasi_id,
            ],
            [
                'attribute' => 'aktif',
                'format' => 'raw',
                'value' => $model->aktif,
            ],
        ],
    ]) ?>

    </div>

    <div class="box-footer">
        <?= Html::a('<i class="fa fa-pencil"></i> Sunting Inovasi Validasi', ['update', 'id' => $model->id], ['class' => 'btn btn-success btn-flat']) ?>
        <?= Html::a('<i class="fa fa-list"></i> Daftar Inovasi Validasi', ['index'], ['class' => 'btn btn-warning btn-flat']) ?>
    </div>

</div>
