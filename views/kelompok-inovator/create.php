<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\KelompokInovator */

$this->title = "Tambah Kelompok Inovator";
$this->params['breadcrumbs'][] = ['label' => 'Kelompok Inovators', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kelompok-inovator-create">

    <?= $this->render('_form', [
        'model' => $model,
        'referrer'=> $referrer
    ]) ?>

</div>
