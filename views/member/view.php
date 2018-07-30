<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\components\Helper;

/* @var $this yii\web\View */
/* @var $model app\models\Member */

$this->title = "Detail Member";
$this->params['breadcrumbs'][] = ['label' => 'Member', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="member-view box box-primary">

    <div class="box-header">
        <h3 class="box-title">Detail Member</h3>
    </div>

    <div class="box-body">

    <?= DetailView::widget([
        'model' => $model,
        'template' => '<tr><th width="180px" style="text-align:right">{label}</th><td>{value}</td></tr>',
        'attributes' => [
            [
                'attribute' => 'email',
                'format' => 'raw',
                'value' => $model->email,
            ],
            [
                'attribute' => 'password',
                'format' => 'raw',
                'value' => $model->password,
            ],
            [
                'attribute' => 'nama',
                'format' => 'raw',
                'value' => $model->nama,
            ],
            [
                'attribute' => 'alamat',
                'format' => 'raw',
                'value' => $model->alamat,
            ],
            [
                'attribute' => 'telepon',
                'format' => 'raw',
                'value' => $model->telepon,
            ],
            [
                'attribute' => 'nama_instansi',
                'format' => 'raw',
                'value' => $model->nama_instansi,
            ],
            [
                'attribute' => 'alamat_instansi',
                'format' => 'raw',
                'value' => $model->alamat_instansi,
            ],
            [
                'attribute' => 'telepon_instansi',
                'format' => 'raw',
                'value' => $model->telepon_instansi,
            ],
            [
                'attribute' => 'login_terakhir',
                'format' => 'raw',
                'value' => $model->login_terakhir,
            ],
            [
                'attribute' => 'aktif',
                'format' => 'raw',
                'value' => $model->aktif,
            ],
            [
                'attribute' => 'waktu_dibuat',
                'format' => 'raw',
                'value' => Helper::getWaktuWIB($model->waktu_dibuat),
            ],
        ],
    ]) ?>

    </div>

    <div class="box-footer">
        <?= Html::a('<i class="fa fa-pencil"></i> Sunting Member', ['update', 'id' => $model->id], ['class' => 'btn btn-success btn-flat']) ?>
        <?= Html::a('<i class="fa fa-list"></i> Daftar Member', ['index'], ['class' => 'btn btn-warning btn-flat']) ?>
    </div>

</div>
