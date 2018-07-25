<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PostCategoryMap */

$this->title = "Tambah Post Category Map";
$this->params['breadcrumbs'][] = ['label' => 'Post Category Maps', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-category-map-create">

    <?= $this->render('_form', [
        'model' => $model,
        'referrer'=> $referrer
    ]) ?>

</div>
