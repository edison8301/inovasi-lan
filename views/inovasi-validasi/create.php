<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\InovasiValidasi */

$this->title = "Tambah Inovasi Validasi";
$this->params['breadcrumbs'][] = ['label' => 'Inovasi Validasis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inovasi-validasi-create">

    <?= $this->render('_form', [
        'model' => $model,
        'referrer'=> $referrer
    ]) ?>

</div>
