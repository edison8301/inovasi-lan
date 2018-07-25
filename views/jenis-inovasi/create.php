<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\JenisInovasi */

$this->title = "Tambah Jenis Inovasi";
$this->params['breadcrumbs'][] = ['label' => 'Jenis Inovasis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jenis-inovasi-create">

    <?= $this->render('_form', [
        'model' => $model,
        'referrer'=> $referrer
    ]) ?>

</div>
