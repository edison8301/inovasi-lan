<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Inovasi */

$this->title = "Sunting Inovasi";
$this->params['breadcrumbs'][] = ['label' => 'Inovasis', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Sunting';
?>
<div class="inovasi-update">

    <?= $this->render('_form', [
        'model' => $model,
        'referrer'=> $referrer
    ]) ?>

</div>
