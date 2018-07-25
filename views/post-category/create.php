<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PostCategory */

$this->title = "Tambah Post Category";
$this->params['breadcrumbs'][] = ['label' => 'Post Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-category-create">

    <?= $this->render('_form', [
        'model' => $model,
        'referrer'=> $referrer
    ]) ?>

</div>
