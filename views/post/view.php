<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\components\Helper;

/* @var $this yii\web\View */
/* @var $model app\models\Post */

$this->title = "Detail Post";
$this->params['breadcrumbs'][] = ['label' => 'Post', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-view box box-primary">

    <div class="box-header">
        <h3 class="box-title">Detail Post</h3>
    </div>

    <div class="box-body">

    <?= DetailView::widget([
        'model' => $model,
        'template' => '<tr><th width="180px" style="text-align:right">{label}</th><td>{value}</td></tr>',
        'attributes' => [
            [
                'attribute' => 'post_category_id',
                'format' => 'raw',
                'value' => $model->postCategory->title,
            ],
            [
                'attribute' => 'title',
                'format' => 'raw',
                'value' => $model->getTitle(),
            ],
            [
                'attribute' => 'content',
                'format' => 'raw',
                'value' => $model->content,
            ],
            [
                'attribute' => 'thumbnail',
                'format' => 'raw',
                'value' => $model->getThumbnail(['class' => 'img-responsive','style' => 'width:150px']),
            ],
            [
                'attribute' => 'tags',
                'format' => 'raw',
                'value' => $model->tags,
            ],
            [
                'attribute' => 'total_views',
                'format' => 'raw',
                'value' => $model->total_views,
            ],
            [
                'attribute' => 'created_time',
                'format' => 'raw',
                'value' => Helper::getWaktuWIB($model->created_time),
            ],
            [
                'attribute' => 'created_by',
                'format' => 'raw',
                'value' => @$model->user->username,
            ],
        ],
    ]) ?>

    </div>

    <div class="box-footer">
        <?= Html::a('<i class="fa fa-pencil"></i> Sunting Post', ['update', 'id' => $model->id], ['class' => 'btn btn-success btn-flat']) ?>
        <?= Html::a('<i class="fa fa-list"></i> Daftar Post', ['index'], ['class' => 'btn btn-warning btn-flat']) ?>
    </div>

</div>
