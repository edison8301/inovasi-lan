<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\TeknikValidasi */

$this->title = "Detail Teknik Validasi";
$this->params['breadcrumbs'][] = ['label' => 'Teknik Validasi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="teknik-validasi-view box box-primary">

    <div class="box-header">
        <h3 class="box-title">Detail Teknik Validasi</h3>
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
        <?= Html::a('<i class="fa fa-pencil"></i> Sunting Teknik Validasi', ['update', 'id' => $model->id], ['class' => 'btn btn-success btn-flat']) ?>
        <?= Html::a('<i class="fa fa-list"></i> Daftar Teknik Validasi', ['index'], ['class' => 'btn btn-warning btn-flat']) ?>
    </div>

</div>
