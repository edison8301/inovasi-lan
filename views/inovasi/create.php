<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Inovasi */

$this->title = "Tambah Inovasi";
$this->params['breadcrumbs'][] = ['label' => 'Inovasis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inovasi-create">

    <?= $this->render('_form', [
        'model' => $model,
        'referrer'=> $referrer
    ]) ?>

</div>
