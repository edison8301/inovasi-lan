<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\PostCategory */

$this->title = "Detail Post Category";
$this->params['breadcrumbs'][] = ['label' => 'Post Category', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-category-view box box-primary">

    <div class="box-header">
        <h3 class="box-title">Detail Post Category</h3>
    </div>

    <div class="box-body">

    <?= DetailView::widget([
        'model' => $model,
        'template' => '<tr><th width="180px" style="text-align:right">{label}</th><td>{value}</td></tr>',
        'attributes' => [
            [
                'attribute' => 'parent_id',
                'format' => 'raw',
                'value' => @$model->parent->title,
            ],
            [
                'attribute' => 'title',
                'format' => 'raw',
                'value' => $model->title,
            ],
        ],
    ]) ?>

    </div>

    <div class="box-footer">
        <?= Html::a('<i class="fa fa-pencil"></i> Sunting Post Category', ['update', 'id' => $model->id], ['class' => 'btn btn-success btn-flat']) ?>
        <?= Html::a('<i class="fa fa-list"></i> Daftar Post Category', ['index'], ['class' => 'btn btn-warning btn-flat']) ?>
    </div>

</div>
