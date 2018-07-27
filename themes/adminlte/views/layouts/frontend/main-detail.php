<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
?>

<?php $this->beginContent('@app/themes/adminlte/views/layouts/frontend/main.php'); ?>

	<div class="container" style="margin-top: 30px">
		<?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>

		<?= $content ?>
	</div>

<?php $this->endContent(); ?>