<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\InovasiValidasi */

$this->title = "Sunting Inovasi Validasi";
$this->params['breadcrumbs'][] = ['label' => 'Inovasi Validasis', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Sunting';
?>
<div class="inovasi-validasi-update">

    <?= $this->render('_form', [
        'model' => $model,
        'referrer'=> $referrer
    ]) ?>

</div>
