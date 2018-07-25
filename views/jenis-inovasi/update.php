<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\JenisInovasi */

$this->title = "Sunting Jenis Inovasi";
$this->params['breadcrumbs'][] = ['label' => 'Jenis Inovasis', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Sunting';
?>
<div class="jenis-inovasi-update">

    <?= $this->render('_form', [
        'model' => $model,
        'referrer'=> $referrer
    ]) ?>

</div>
