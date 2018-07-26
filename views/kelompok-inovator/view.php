<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\KelompokInovator */

$this->title = "Detail Kelompok Inovator";
$this->params['breadcrumbs'][] = ['label' => 'Kelompok Inovator', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kelompok-inovator-view box box-primary">

    <div class="box-header">
        <h3 class="box-title">Detail Kelompok Inovator</h3>
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
                'attribute' => 'nama',
                'format' => 'raw',
                'value' => $model->nama,
            ],
        ],
    ]) ?>

    </div>

    <div class="box-footer">
        <?= Html::a('<i class="fa fa-pencil"></i> Sunting Kelompok Inovator', ['update', 'id' => $model->id], ['class' => 'btn btn-success btn-flat']) ?>
        <?= Html::a('<i class="fa fa-list"></i> Daftar Kelompok Inovator', ['index'], ['class' => 'btn btn-warning btn-flat']) ?>
    </div>

</div>
