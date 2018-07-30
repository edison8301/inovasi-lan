<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\PostCategoryMap */

$this->title = "Detail Post Category Map";
$this->params['breadcrumbs'][] = ['label' => 'Post Category Map', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-category-map-view box box-primary">

    <div class="box-header">
        <h3 class="box-title">Detail Post Category Map</h3>
    </div>

    <div class="box-body">

    <?= DetailView::widget([
        'model' => $model,
        'template' => '<tr><th width="180px" style="text-align:right">{label}</th><td>{value}</td></tr>',
        'attributes' => [
            [
                'attribute' => 'post_id',
                'format' => 'raw',
                'value' => @$model->post->title,
            ],
            [
                'attribute' => 'post_category_id',
                'format' => 'raw',
                'value' => @$model->postCategory->title,
            ],
            [
                'attribute' => 'active',
                'format' => 'raw',
                'value' => $model->getStatus(),
            ],
        ],
    ]) ?>

    </div>

    <div class="box-footer">
        <?= Html::a('<i class="fa fa-pencil"></i> Sunting Post Category Map', ['update', 'id' => $model->id], ['class' => 'btn btn-success btn-flat']) ?>
        <?= Html::a('<i class="fa fa-list"></i> Daftar Post Category Map', ['index'], ['class' => 'btn btn-warning btn-flat']) ?>
    </div>

</div>
