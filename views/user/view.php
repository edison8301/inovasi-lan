<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\User;
use app\models\UserRole;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = "Detail User";
$this->params['breadcrumbs'][] = ['label' => 'User', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view box box-primary">

    <div class="box-header">
        <h3 class="box-title">Detail User</h3>
    </div>

    <div class="box-body">
        <?= DetailView::widget([
            'model' => $model,
            'template' => '<tr><th width="180px" style="text-align:right">{label}</th><td>{value}</td></tr>',
            'attributes' => [
                [
                    'attribute' => 'id_user_role',
                    'format' => 'raw',
                    'value' => $model->getRole()
                ],
                [
                    'attribute' => 'username',
                    'format' => 'raw',
                    'value' => $model->username
                ],
                [
                    'attribute' => 'email',
                    'format' => 'raw',
                ],
                [
                    'label' => 'Status Aktif',
                    'format' => 'raw',
                    'value' => $model->getLabelStatusAktif()
                ],
            ],
        ]) ?>
    </div>

    <div class="box-footer">
        <?= Html::a('<i class="fa fa-pencil"></i> Sunting User', ['update', 'id' => $model->id], ['class' => 'btn btn-primary btn-flat']) ?>
        <?= Html::a('<i class="fa fa-list"></i> Daftar User', ['index','id_user_role' => $model->id_user_role], ['class' => 'btn btn-primary btn-flat']) ?>
    </div>

</div>
