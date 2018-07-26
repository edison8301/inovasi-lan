<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TeknikValidasi */

$this->title = "Sunting Teknik Validasi";
$this->params['breadcrumbs'][] = ['label' => 'Teknik Validasis', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Sunting';
?>
<div class="teknik-validasi-update">

    <?= $this->render('_form', [
        'model' => $model,
        'referrer'=> $referrer
    ]) ?>

</div>
