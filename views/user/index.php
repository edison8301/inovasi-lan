<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\UserRole;
use app\models\User;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Daftar User';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index box box-primary">

    <div class="box-header">
        <?php if ($id_user_role == UserRole::PEGAWAI) { ?>
            <?= Html::a('<i class="fa fa-plus"></i> Tambah User', ['/pegawai/create'], ['class' => 'btn btn-primary btn-flat']) ?>
        <?php } elseif ($id_user_role == UserRole::ANGGOTA) { ?>
            <?= Html::a('<i class="fa fa-plus"></i> Tambah User', ['/anggota/create'], ['class' => 'btn btn-primary btn-flat']) ?>
        <?php } else { ?> 
            <?= Html::a('<i class="fa fa-plus"></i> Tambah User', ['create','id_user_role'=>$id_user_role], ['class' => 'btn btn-primary btn-flat']) ?>
        <?php } ?>
        <?= Html::a('<i class="fa fa-print"></i> Export Excel User', Yii::$app->request->url.'&export=1', ['class' => 'btn btn-primary btn-flat']) ?>

    </div>

    <div class="box-body">

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                [
                    'class' => 'yii\grid\SerialColumn',
                    'header' => 'No',
                    'headerOptions' => ['style' => 'text-align:center'],
                    'contentOptions' => ['style' => 'text-align:center;width:65px']
                ],
                [
                    'attribute' => 'username',
                    'headerOptions' => ['style' => 'text-align:center;'],
                    'contentOptions' => ['style' => 'text-align:left;'],
                ],
                [
                    'attribute' => 'email',
                    'format' => 'raw',
                ],
                [
                    'label' => 'Status Aktif',
                    'format' => 'raw',
                    'headerOptions' => ['style' => 'text-align:center;width:100px'],
                    'contentOptions' => ['style' => 'text-align:center;'],
                    'value' => function($data) {
                        return $data->getLabelStatusAktif();
                    }
                ],
                [
                    'label' => '',
                    'format' => 'raw',
                    'headerOptions' => ['style' => 'text-align:center;'],
                    'contentOptions' => ['style' => 'text-align:center;width:80px'],
                    'value' => function($data) {
                        return $data->setPassword();
                    }
                ],
                [
                    'class' => 'app\components\ToggleActionColumn',
                    'contentOptions' => ['style' => 'text-align:center;width:80px']
                ],
            ],
        ]); ?>
    
    
    </div>
</div>
