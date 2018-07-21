<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\User;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = "Detail Akun";
$this->params['breadcrumbs'][] = ['label' => 'Akun'];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view box box-primary">
    <div class="box-header">
        <h3 class="box-title">Informasi Akun</h3>
    </div>
    <div class="box-body">
        <?= DetailView::widget([
            'model' => $model,
            'template' => '<tr><th width="180px" style="text-align:right">{label}</th><td>{value}</td></tr>',
            'attributes' => [
                [
                    'attribute' => 'username',
                    'format' => 'raw',
                    'value' => $model->username,
                ],
                [
                    'attribute' => 'email',
                    'format' => 'raw',
                    'value' => $model->email,
                ],
            ],
        ]) ?>
    </div>
    <div class="box-footer">
        <?= Html::a('<i class="fa fa-pencil"></i> Sunting Akun', ['user/update','id' => $model->id], ['class' => 'btn btn-success btn-flat']); ?>

    <?= Html::a('<i class="fa fa-key"></i> Ganti Password', ['user/set-password'], ['class' => 'btn btn-success btn-flat']); ?>
    </div>
</div>