<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TeknikValidasi */

$this->title = "Tambah Teknik Validasi";
$this->params['breadcrumbs'][] = ['label' => 'Teknik Validasis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="teknik-validasi-create">

    <?= $this->render('_form', [
        'model' => $model,
        'referrer'=> $referrer
    ]) ?>

</div>
