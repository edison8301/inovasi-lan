<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\KelompokInovator */

$this->title = "Sunting Kelompok Inovator";
$this->params['breadcrumbs'][] = ['label' => 'Kelompok Inovators', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Sunting';
?>
<div class="kelompok-inovator-update">

    <?= $this->render('_form', [
        'model' => $model,
        'referrer'=> $referrer
    ]) ?>

</div>
