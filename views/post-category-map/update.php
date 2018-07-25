<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PostCategoryMap */

$this->title = "Sunting Post Category Map";
$this->params['breadcrumbs'][] = ['label' => 'Post Category Maps', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Sunting';
?>
<div class="post-category-map-update">

    <?= $this->render('_form', [
        'model' => $model,
        'referrer'=> $referrer
    ]) ?>

</div>
