<?php

use app\components\Helper;
use app\models\PostCategory;
use yii\grid\GridView;
use yii\helpers\Html;
use app\models\User;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PostSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Daftar Post';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-index box box-primary">

    <div class="box-header">
        <?= Html::a('<i class="fa fa-plus"></i> Tambah Post', ['create'], ['class' => 'btn btn-success btn-flat']) ?>
        <?= Html::a('<i class="fa fa-print"></i> Export Excel Post', Yii::$app->request->url.'&export=1', ['class' => 'btn btn-success btn-flat']) ?>

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
                'attribute' => 'title',
                'format' => 'raw',
                'value' => function($data){
                    return $data->getTitle();
                },
                'headerOptions' => ['style' => 'text-align:center;'],
                'contentOptions' => ['style' => 'text-align:left;'],
            ],
            [
                'attribute' => 'post_category_id',
                'format' => 'raw',
                'filter' => PostCategory::getList(),
                'value' => function($data){
                    return @$data->postCategory->title;
                },
                'headerOptions' => ['style' => 'text-align:center; width: 150px'],
                'contentOptions' => ['style' => 'text-align:center;'],
            ],
            [
                'attribute' => 'created_by',
                'format' => 'raw',
                'filter' => User::getList(),
                'value' => function($data){
                    return @$data->user->username;
                },
                'headerOptions' => ['style' => 'text-align:center; width: 120px'],
                'contentOptions' => ['style' => 'text-align:center;'],
            ],
            [
                'attribute' => 'created_time',
                'format' => 'raw',
                'value' => function($data){
                    return Helper::getWaktuWIB($data->created_time);
                },
                'headerOptions' => ['style' => 'text-align:center; width:200px'],
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
