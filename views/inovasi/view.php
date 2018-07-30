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

        <?php $items = [
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
        ]); ?>

    </div>

    <div class="box-footer">
        <?= Html::a('<i class="fa fa-pencil"></i> Sunting Inovasi', ['update', 'id' => $model->id], ['class' => 'btn btn-success btn-flat']) ?>
        <?= Html::a('<i class="fa fa-list"></i> Daftar Inovasi', ['index'], ['class' => 'btn btn-warning btn-flat']) ?>
    </div>

</div>
