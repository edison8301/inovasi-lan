<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PostCategory */

$this->title = "Sunting Post Category";
$this->params['breadcrumbs'][] = ['label' => 'Post Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Sunting';
?>
<div class="post-category-update">

    <?= $this->render('_form', [
        'model' => $model,
        'referrer'=> $referrer
    ]) ?>

</div>
